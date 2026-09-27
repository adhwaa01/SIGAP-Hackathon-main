import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'screens/login_screen.dart';
import 'screens/dashboard_screen.dart';
import 'screens/competency_map_screen.dart';
import 'screens/recommendation_screen.dart';
import 'screens/ai_tutor_screen.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  final prefs = await SharedPreferences.getInstance();
  final hasToken = prefs.getString('token') != null;

  runApp(SigapApp(hasToken: hasToken));
}

class SigapApp extends StatelessWidget {
  final bool hasToken;

  const SigapApp({Key? key, required this.hasToken}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'SIGAP',
      theme: ThemeData(
        primaryColor: const Color(0xFF0B132B), // Deep Navy
        colorScheme: ColorScheme.fromSeed(
          seedColor: const Color(0xFF2563EB), // Electric Blue
          primary: const Color(0xFF2563EB),
          secondary: const Color(0xFF06B6D4), // Cyan
        ),
        fontFamily: 'Inter',
        useMaterial3: true,
        appBarTheme: const AppBarTheme(
          backgroundColor: Color(0xFF0B132B),
          foregroundColor: Colors.white,
          elevation: 0,
        ),
      ),
      initialRoute: hasToken ? '/dashboard' : '/login',
      routes: {
        '/login': (context) => const LoginScreen(),
        '/dashboard': (context) => const DashboardScreen(),
        '/competency_map': (context) => const CompetencyMapScreen(),
        '/recommendations': (context) => const RecommendationScreen(),
        '/ai_tutor': (context) => const AiTutorScreen(),
      },
      debugShowCheckedModeBanner: false,
    );
  }
}
