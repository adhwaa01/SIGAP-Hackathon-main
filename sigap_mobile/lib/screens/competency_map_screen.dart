import 'package:flutter/material.dart';
import '../services/api_service.dart';
import 'assessment_screen.dart';

class CompetencyMapScreen extends StatefulWidget {
  const CompetencyMapScreen({Key? key}) : super(key: key);

  @override
  State<CompetencyMapScreen> createState() => _CompetencyMapScreenState();
}

class _CompetencyMapScreenState extends State<CompetencyMapScreen> {
  List<dynamic> _competencies = [];
  bool _isLoading = true;

  @override
  void initState() {
    super.initState();
    _loadData();
  }

  Future<void> _loadData() async {
    try {
      final data = await ApiService.getCompetencies();
      setState(() {
        _competencies = data['competencies'] ?? [];
        _isLoading = false;
      });
    } catch (e) {
      setState(() => _isLoading = false);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xFFF3F4F6),
      appBar: AppBar(title: const Text('Competency Map')),
      body: _isLoading 
        ? const Center(child: CircularProgressIndicator())
        : ListView.builder(
            padding: const EdgeInsets.all(16),
            itemCount: _competencies.length,
            itemBuilder: (context, index) {
              final comp = _competencies[index];
              final int mastery = comp['mastery_level'] ?? 0;
              
              Color progressColor = Colors.red;
              if (mastery >= 75) progressColor = Colors.green;
              else if (mastery >= 50) progressColor = Colors.amber;

              return Card(
                margin: const EdgeInsets.only(bottom: 16),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
                child: Padding(
                  padding: const EdgeInsets.all(16),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Expanded(
                            child: Text(
                              comp['name'],
                              style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 16),
                            ),
                          ),
                          Text(
                            '$mastery%',
                            style: TextStyle(fontWeight: FontWeight.bold, fontSize: 16, color: progressColor),
                          ),
                        ],
                      ),
                      const SizedBox(height: 12),
                      LinearProgressIndicator(
                        value: mastery / 100,
                        backgroundColor: Colors.grey[200],
                        color: progressColor,
                        minHeight: 8,
                        borderRadius: BorderRadius.circular(4),
                      ),
                      const SizedBox(height: 12),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.end,
                        children: [
                          TextButton(
                            onPressed: () {
                              // TODO: Navigate to Learning Path
                            },
                            child: const Text('Belajar'),
                          ),
                          ElevatedButton(
                            onPressed: () {
                              Navigator.push(context, MaterialPageRoute(
                                builder: (context) => AssessmentScreen(competencyId: comp['id']),
                              ));
                            },
                            style: ElevatedButton.styleFrom(
                              backgroundColor: const Color(0xFF2563EB),
                              foregroundColor: Colors.white,
                              shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(8)),
                            ),
                            child: const Text('Test'),
                          ),
                        ],
                      )
                    ],
                  ),
                ),
              );
            },
          ),
    );
  }
}
