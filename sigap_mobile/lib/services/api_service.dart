import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

class ApiService {
  // Use 10.0.2.2 for Android emulator, 127.0.0.1 for iOS simulator / web
  // Since we might test in browser/windows, let's use 127.0.0.1 for now
  static const String baseUrl = 'http://127.0.0.1:8000/api';

  static Future<Map<String, String>> _getHeaders() async {
    final prefs = await SharedPreferences.getInstance();
    final token = prefs.getString('token');
    return {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      if (token != null) 'Authorization': 'Bearer $token',
    };
  }

  static Future<Map<String, dynamic>> login(String email, String password) async {
    final response = await http.post(
      Uri.parse('$baseUrl/login'),
      headers: {'Content-Type': 'application/json', 'Accept': 'application/json'},
      body: jsonEncode({'email': email, 'password': password}),
    );
    return jsonDecode(response.body);
  }

  static Future<Map<String, dynamic>> register(String name, String email, String password) async {
    final response = await http.post(
      Uri.parse('$baseUrl/register'),
      headers: {'Content-Type': 'application/json', 'Accept': 'application/json'},
      body: jsonEncode({
        'name': name,
        'email': email,
        'password': password,
        'password_confirmation': password,
        'role': 'learner'
      }),
    );
    return jsonDecode(response.body);
  }

  static Future<void> logout() async {
    await http.post(
      Uri.parse('$baseUrl/logout'),
      headers: await _getHeaders(),
    );
    final prefs = await SharedPreferences.getInstance();
    await prefs.remove('token');
  }

  static Future<Map<String, dynamic>> getDashboard() async {
    final response = await http.get(Uri.parse('$baseUrl/dashboard'), headers: await _getHeaders());
    return jsonDecode(response.body);
  }

  static Future<Map<String, dynamic>> getCompetencies() async {
    final response = await http.get(Uri.parse('$baseUrl/competencies'), headers: await _getHeaders());
    return jsonDecode(response.body);
  }

  static Future<Map<String, dynamic>> startAssessment(int competencyId) async {
    final response = await http.get(Uri.parse('$baseUrl/assessment/$competencyId/start'), headers: await _getHeaders());
    return jsonDecode(response.body);
  }

  static Future<Map<String, dynamic>> submitAnswer(int sessionId, int questionId, String answer) async {
    final response = await http.post(
      Uri.parse('$baseUrl/assessment/$sessionId/answer'),
      headers: await _getHeaders(),
      body: jsonEncode({'question_id': questionId, 'selected_answer': answer}),
    );
    return jsonDecode(response.body);
  }

  static Future<Map<String, dynamic>> getRecommendations() async {
    final response = await http.get(Uri.parse('$baseUrl/recommendations'), headers: await _getHeaders());
    return jsonDecode(response.body);
  }
  
  static Future<Map<String, dynamic>> getLearningPath(int competencyId) async {
    final response = await http.get(Uri.parse('$baseUrl/learning-path/$competencyId'), headers: await _getHeaders());
    return jsonDecode(response.body);
  }

  static Future<Map<String, dynamic>> sendAiChat(String message) async {
    final response = await http.post(
      Uri.parse('$baseUrl/ai/chat'),
      headers: await _getHeaders(),
      body: jsonEncode({'message': message}),
    );
    return jsonDecode(response.body);
  }
}
