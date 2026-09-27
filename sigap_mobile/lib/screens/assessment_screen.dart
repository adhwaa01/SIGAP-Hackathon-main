import 'package:flutter/material.dart';
import '../services/api_service.dart';

class AssessmentScreen extends StatefulWidget {
  final int competencyId;
  const AssessmentScreen({Key? key, required this.competencyId}) : super(key: key);

  @override
  State<AssessmentScreen> createState() => _AssessmentScreenState();
}

class _AssessmentScreenState extends State<AssessmentScreen> {
  bool _isLoading = true;
  Map<String, dynamic>? _sessionData;
  Map<String, dynamic>? _currentQuestion;
  String? _selectedAnswer;
  bool _isAnswerSubmitted = false;
  Map<String, dynamic>? _answerResult;

  @override
  void initState() {
    super.initState();
    _startAssessment();
  }

  Future<void> _startAssessment() async {
    try {
      final data = await ApiService.startAssessment(widget.competencyId);
      setState(() {
        _sessionData = data;
        _currentQuestion = data['question'];
        _isLoading = false;
      });
    } catch (e) {
      setState(() => _isLoading = false);
    }
  }

  Future<void> _submitAnswer() async {
    if (_selectedAnswer == null) return;
    
    setState(() => _isAnswerSubmitted = true);
    
    try {
      final result = await ApiService.submitAnswer(
        _sessionData!['session_id'], 
        _currentQuestion!['id'], 
        _selectedAnswer!
      );
      
      setState(() {
        _answerResult = result;
      });
    } catch (e) {
      // Handle error
    }
  }

  void _nextQuestion() {
    if (_answerResult?['session_complete'] == true) {
      _showResultDialog();
      return;
    }
    
    setState(() {
      _currentQuestion = _answerResult?['question'];
      _sessionData!['question_number'] = _answerResult?['question_number'];
      _sessionData!['current_difficulty'] = _answerResult?['current_difficulty'];
      _selectedAnswer = null;
      _isAnswerSubmitted = false;
      _answerResult = null;
    });
  }

  void _showResultDialog() {
    showDialog(
      context: context,
      barrierDismissible: false,
      builder: (context) => AlertDialog(
        title: const Text('Assessment Selesai!'),
        content: Column(
          mainAxisSize: MainAxisSize.min,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(_answerResult!['message'], style: const TextStyle(fontWeight: FontWeight.bold)),
            const SizedBox(height: 16),
            Text('Skor Akhir: ${_answerResult!['score']} / 100'),
            Text('Mastery Sebelum: ${_answerResult!['mastery_before']}%'),
            Text('Mastery Sesudah: ${_answerResult!['mastery_after']}%', style: const TextStyle(fontWeight: FontWeight.bold, color: Colors.blue)),
          ],
        ),
        actions: [
          TextButton(
            onPressed: () {
              Navigator.pop(context); // close dialog
              Navigator.pop(context); // close screen
            },
            child: const Text('Kembali ke Menu'),
          )
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    if (_isLoading) return const Scaffold(body: Center(child: CircularProgressIndicator()));
    if (_sessionData == null) return const Scaffold(body: Center(child: Text('Gagal memuat soal')));

    final q = _currentQuestion!;
    final List<dynamic> options = q['options'];

    return Scaffold(
      backgroundColor: const Color(0xFFF3F4F6),
      appBar: AppBar(
        title: Text(_sessionData!['competency'], style: const TextStyle(fontSize: 16)),
        bottom: PreferredSize(
          preferredSize: const Size.fromHeight(4.0),
          child: LinearProgressIndicator(
            value: _sessionData!['question_number'] / _sessionData!['total_questions'],
            backgroundColor: Colors.white24,
            color: Colors.amber,
          ),
        ),
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text('Soal ${_sessionData!['question_number']} / ${_sessionData!['total_questions']}', 
                  style: const TextStyle(fontWeight: FontWeight.bold, color: Colors.grey)),
                Container(
                  padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 4),
                  decoration: BoxDecoration(color: Colors.blue[100], borderRadius: BorderRadius.circular(12)),
                  child: Text('Level ${_sessionData!['current_difficulty']}', 
                    style: TextStyle(color: Colors.blue[800], fontSize: 12, fontWeight: FontWeight.bold)),
                )
              ],
            ),
            const SizedBox(height: 24),
            
            // Question Text
            Container(
              padding: const EdgeInsets.all(20),
              decoration: BoxDecoration(color: Colors.white, borderRadius: BorderRadius.circular(16)),
              child: Text(
                q['question_text'].replaceAll(r'\n', '\n'),
                style: const TextStyle(fontSize: 16, height: 1.5),
              ),
            ),
            const SizedBox(height: 24),

            // Options
            Expanded(
              child: ListView.builder(
                itemCount: options.length,
                itemBuilder: (context, index) {
                  final optStr = options[index].toString();
                  final optLetter = optStr.substring(0, 1);
                  
                  Color bgColor = Colors.white;
                  Color borderColor = Colors.grey[300]!;
                  
                  if (_isAnswerSubmitted && _answerResult != null) {
                    if (optLetter == _answerResult!['correct_answer']) {
                      bgColor = Colors.green[50]!;
                      borderColor = Colors.green;
                    } else if (_selectedAnswer == optLetter) {
                      bgColor = Colors.red[50]!;
                      borderColor = Colors.red;
                    }
                  } else if (_selectedAnswer == optLetter) {
                    bgColor = Colors.blue[50]!;
                    borderColor = Colors.blue;
                  }

                  return GestureDetector(
                    onTap: _isAnswerSubmitted ? null : () => setState(() => _selectedAnswer = optLetter),
                    child: Container(
                      margin: const EdgeInsets.only(bottom: 12),
                      padding: const EdgeInsets.all(16),
                      decoration: BoxDecoration(
                        color: bgColor,
                        border: Border.all(color: borderColor, width: 2),
                        borderRadius: BorderRadius.circular(12),
                      ),
                      child: Text(optStr, style: const TextStyle(fontSize: 15)),
                    ),
                  );
                },
              ),
            ),
            
            // Explanation
            if (_isAnswerSubmitted && _answerResult != null)
              Container(
                margin: const EdgeInsets.only(bottom: 16),
                padding: const EdgeInsets.all(16),
                decoration: BoxDecoration(
                  color: _answerResult!['is_correct'] ? Colors.green[50] : Colors.orange[50],
                  borderRadius: BorderRadius.circular(12),
                  border: Border.all(color: _answerResult!['is_correct'] ? Colors.green : Colors.orange),
                ),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      _answerResult!['is_correct'] ? '✅ Benar!' : '❌ Kurang tepat', 
                      style: TextStyle(fontWeight: FontWeight.bold, 
                        color: _answerResult!['is_correct'] ? Colors.green[700] : Colors.orange[700])
                    ),
                    const SizedBox(height: 8),
                    Text(_answerResult!['explanation'] ?? '', style: const TextStyle(fontSize: 14)),
                  ],
                ),
              ),

            // Button
            ElevatedButton(
              onPressed: _selectedAnswer == null ? null : (_isAnswerSubmitted ? _nextQuestion : _submitAnswer),
              style: ElevatedButton.styleFrom(
                backgroundColor: const Color(0xFF2563EB),
                foregroundColor: Colors.white,
                padding: const EdgeInsets.symmetric(vertical: 16),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
              ),
              child: Text(_isAnswerSubmitted ? 'Selanjutnya' : 'Kirim Jawaban', 
                style: const TextStyle(fontSize: 16, fontWeight: FontWeight.bold)),
            ),
          ],
        ),
      ),
    );
  }
}
