<?php

namespace Database\Seeders;

use App\Models\Competency;
use App\Models\AssessmentQuestion;
use Illuminate\Database\Seeder;

class CompetencySeeder extends Seeder
{
    public function run(): void
    {
        $competencies = [
            ['name' => 'Variabel & Tipe Data',  'category' => 'Programming', 'description' => 'Pemahaman tentang variabel, tipe data primitif, dan operasi dasar', 'order' => 1],
            ['name' => 'Struktur Kontrol',       'category' => 'Programming', 'description' => 'If-else, switch-case, dan logika percabangan program', 'order' => 2],
            ['name' => 'Perulangan (Loop)',       'category' => 'Programming', 'description' => 'For, while, do-while, dan iterasi data', 'order' => 3],
            ['name' => 'Fungsi & Prosedur',      'category' => 'Programming', 'description' => 'Deklarasi fungsi, parameter, return value, dan scope', 'order' => 4],
            ['name' => 'Array & Koleksi',        'category' => 'Programming', 'description' => 'Array satu dimensi, multi dimensi, dan operasi koleksi data', 'order' => 5],
        ];

        foreach ($competencies as $comp) {
            $competency = Competency::create($comp);
            $this->seedQuestions($competency);
        }
    }

    private function seedQuestions(Competency $competency): void
    {
        $questions = $this->getQuestions($competency->name);

        foreach ($questions as $q) {
            AssessmentQuestion::create([
                'competency_id'   => $competency->id,
                'question_text'   => $q['question'],
                'options'         => $q['options'],
                'correct_answer'  => $q['answer'],
                'difficulty_level'=> $q['difficulty'],
                'explanation'     => $q['explanation'],
            ]);
        }
    }

    private function getQuestions(string $competencyName): array
    {
        return match($competencyName) {
            'Variabel & Tipe Data' => $this->variabelQuestions(),
            'Struktur Kontrol'     => $this->strukturKontrolQuestions(),
            'Perulangan (Loop)'    => $this->perulanganQuestions(),
            'Fungsi & Prosedur'    => $this->fungsiQuestions(),
            'Array & Koleksi'      => $this->arrayQuestions(),
            default                => [],
        };
    }

    private function variabelQuestions(): array
    {
        return [
            // Level 1 (3 soal)
            [
                'question'    => 'Apa output dari kode berikut?\n```python\nx = 5\nprint(x)\n```',
                'options'     => ['A. x', 'B. 5', 'C. "5"', 'D. Error'],
                'answer'      => 'B',
                'difficulty'  => 1,
                'explanation' => 'Variabel x menyimpan nilai integer 5, sehingga print(x) menampilkan angka 5.',
            ],
            [
                'question'    => 'Tipe data apa yang tepat untuk menyimpan nilai True atau False?',
                'options'     => ['A. int', 'B. float', 'C. bool', 'D. str'],
                'answer'      => 'C',
                'difficulty'  => 1,
                'explanation' => 'Boolean (bool) adalah tipe data yang hanya bisa bernilai True atau False.',
            ],
            [
                'question'    => 'Mana yang merupakan cara pendeklarasian variabel yang benar di Python?',
                'options'     => ['A. int x = 5', 'B. x = 5', 'C. var x = 5', 'D. declare x = 5'],
                'answer'      => 'B',
                'difficulty'  => 1,
                'explanation' => 'Python menggunakan assignment langsung tanpa keyword tipe data. Cukup tulis nama_variabel = nilai.',
            ],
            // Level 2 (3 soal)
            [
                'question'    => 'Apa hasil dari operasi berikut?\n```python\nx = "10"\ny = int(x) + 5\nprint(y)\n```',
                'options'     => ['A. "105"', 'B. 105', 'C. 15', 'D. Error'],
                'answer'      => 'C',
                'difficulty'  => 2,
                'explanation' => 'int(x) mengkonversi string "10" menjadi integer 10, kemudian ditambah 5 menghasilkan 15.',
            ],
            [
                'question'    => 'Apa perbedaan antara int dan float di Python?',
                'options'     => ['A. int untuk angka besar, float untuk kecil', 'B. int untuk bilangan bulat, float untuk bilangan desimal', 'C. Tidak ada perbedaan', 'D. int lebih cepat dari float'],
                'answer'      => 'B',
                'difficulty'  => 2,
                'explanation' => 'int menyimpan bilangan bulat (seperti 5, -3, 100), sedangkan float menyimpan bilangan desimal (seperti 3.14, -0.5).',
            ],
            [
                'question'    => 'Apa output dari kode ini?\n```python\na = 10\nb = a\na = 20\nprint(b)\n```',
                'options'     => ['A. 10', 'B. 20', 'C. None', 'D. Error'],
                'answer'      => 'A',
                'difficulty'  => 2,
                'explanation' => 'Saat b = a, nilai 10 di-copy ke b. Ketika a diubah ke 20, nilai b tidak berubah karena Python menyalin nilai integer (immutable).',
            ],
            // Level 3 (3 soal)
            [
                'question'    => 'Apa output dari kode berikut?\n```python\nx = 5\ny = 2\nprint(x // y, x % y)\n```',
                'options'     => ['A. 2.5 1', 'B. 2 1', 'C. 3 1', 'D. 2 0'],
                'answer'      => 'B',
                'difficulty'  => 3,
                'explanation' => '// adalah operator pembagian bulat (floor division), 5//2 = 2. % adalah operator modulo (sisa bagi), 5%2 = 1.',
            ],
            [
                'question'    => 'Apa yang dimaksud dengan type casting?',
                'options'     => ['A. Membuat variabel baru', 'B. Mengubah tipe data suatu nilai ke tipe lain', 'C. Menghapus variabel', 'D. Membandingkan dua variabel'],
                'answer'      => 'B',
                'difficulty'  => 3,
                'explanation' => 'Type casting adalah proses mengkonversi nilai dari satu tipe data ke tipe data lainnya, misalnya int("5") mengubah string ke integer.',
            ],
            [
                'question'    => 'Perhatikan kode berikut:\n```python\nx = None\nprint(type(x))\n```\nApa output-nya?',
                'options'     => ['A. <class \'undefined\'>', 'B. <class \'None\'>', 'C. <class \'NoneType\'>', 'D. Error'],
                'answer'      => 'C',
                'difficulty'  => 3,
                'explanation' => 'None adalah nilai khusus di Python dengan tipe NoneType. type(None) akan mengembalikan <class \'NoneType\'>.',
            ],
            // Level 4 (3 soal)
            [
                'question'    => 'Apa output dari kode ini?\n```python\nprint(0.1 + 0.2 == 0.3)\n```',
                'options'     => ['A. True', 'B. False', 'C. 0.3', 'D. Error'],
                'answer'      => 'B',
                'difficulty'  => 4,
                'explanation' => 'Floating point arithmetic tidak presisi sempurna. 0.1 + 0.2 = 0.30000000000000004 di Python karena representasi biner float, sehingga tidak sama dengan 0.3.',
            ],
            [
                'question'    => 'Apa output dari kode ini?\n```python\nx = 5\nprint(type(x).__name__)\n```',
                'options'     => ['A. int', 'B. <class \'int\'>', 'C. integer', 'D. 5'],
                'answer'      => 'A',
                'difficulty'  => 4,
                'explanation' => 'type(x) mengembalikan object class int. Dengan .__name__ kita bisa mendapatkan nama class tersebut sebagai string "int".',
            ],
            [
                'question'    => 'Variabel apa yang bersifat global dalam kode ini?\n```python\nx = 10\ndef fungsi():\n    y = 20\n    return y\n```',
                'options'     => ['A. y', 'B. x', 'C. x dan y', 'D. Tidak ada'],
                'answer'      => 'B',
                'difficulty'  => 4,
                'explanation' => 'x dideklarasikan di luar fungsi sehingga bersifat global. y dideklarasikan di dalam fungsi sehingga bersifat lokal (hanya ada dalam scope fungsi).',
            ],
            // Level 5 (3 soal)
            [
                'question'    => 'Apa perbedaan antara "is" dan "==" di Python untuk membandingkan objek?',
                'options'     => ['A. Tidak ada perbedaan', 'B. "is" membandingkan nilai, "==" membandingkan identitas objek', 'C. "is" membandingkan identitas objek (id), "==" membandingkan nilai', 'D. "is" hanya untuk string'],
                'answer'      => 'C',
                'difficulty'  => 5,
                'explanation' => '"is" mengecek apakah dua variabel merujuk ke objek yang sama di memori (id() yang sama). "==" mengecek apakah nilainya sama. Contoh: a = [1,2]; b = [1,2]; a == b adalah True, tapi a is b adalah False.',
            ],
            [
                'question'    => 'Apa output dari kode berikut?\n```python\na = [1, 2, 3]\nb = a\nb.append(4)\nprint(a)\n```',
                'options'     => ['A. [1, 2, 3]', 'B. [1, 2, 3, 4]', 'C. [4]', 'D. Error'],
                'answer'      => 'B',
                'difficulty'  => 5,
                'explanation' => 'List adalah mutable dan b = a tidak membuat copy, melainkan b merujuk ke objek yang sama dengan a. Jadi append(4) ke b juga mengubah a. Ini disebut "shallow copy" vs "deep copy" issue.',
            ],
            [
                'question'    => 'Apa yang dimaksud dengan "duck typing" di Python?',
                'options'     => ['A. Tipe data harus dideklarasikan eksplisit', 'B. Python tidak mendukung tipe data', 'C. Tipe objek ditentukan oleh kemampuannya (method yang dimiliki), bukan oleh class-nya', 'D. Cara deklarasi variabel dengan tanda kutip bebek'],
                'answer'      => 'C',
                'difficulty'  => 5,
                'explanation' => 'Duck typing: "Jika ia berjalan seperti bebek dan bersuara seperti bebek, maka itu adalah bebek." Python lebih peduli apakah objek memiliki method yang diperlukan, bukan tipe spesifiknya.',
            ],
        ];
    }

    private function strukturKontrolQuestions(): array
    {
        return [
            // Level 1
            ['question' => 'Apa output dari kode berikut?\n```python\nx = 10\nif x > 5:\n    print("Besar")\nelse:\n    print("Kecil")\n```', 'options' => ['A. Kecil', 'B. Besar', 'C. 10', 'D. Error'], 'answer' => 'B', 'difficulty' => 1, 'explanation' => 'x = 10 dan 10 > 5 adalah True, sehingga blok if dieksekusi dan menampilkan "Besar".'],
            ['question' => 'Kapan blok "else" dieksekusi?', 'options' => ['A. Selalu', 'B. Ketika kondisi if adalah True', 'C. Ketika kondisi if adalah False', 'D. Tidak pernah'], 'answer' => 'C', 'difficulty' => 1, 'explanation' => 'Blok else dieksekusi ketika kondisi if bernilai False.'],
            ['question' => 'Apa yang dilakukan operator "and" dalam kondisi if?', 'options' => ['A. Memeriksa salah satu kondisi True', 'B. Memeriksa kedua kondisi harus True', 'C. Membalik kondisi', 'D. Memeriksa kondisi tidak sama'], 'answer' => 'B', 'difficulty' => 1, 'explanation' => '"and" mengembalikan True hanya jika KEDUA kondisi bernilai True. Jika salah satu False, hasilnya False.'],
            // Level 2
            ['question' => 'Apa output dari kode ini?\n```python\nnilai = 75\nif nilai >= 90:\n    print("A")\nelif nilai >= 75:\n    print("B")\nelif nilai >= 60:\n    print("C")\nelse:\n    print("D")\n```', 'options' => ['A. A', 'B. B', 'C. C', 'D. D'], 'answer' => 'B', 'difficulty' => 2, 'explanation' => 'nilai = 75. Kondisi pertama (>=90) False. Kondisi elif pertama (>=75) True karena 75>=75, sehingga mencetak "B". Kondisi selanjutnya tidak dicek lagi.'],
            ['question' => 'Berapa nilai minimum yang harus ada agar kondisi "a > 5 and b < 10" bernilai True, jika a = 7?', 'options' => ['A. b < 0', 'B. b bisa bernilai apa saja asal < 10', 'C. b harus tepat 9', 'D. b tidak mempengaruhi hasil'], 'answer' => 'B', 'difficulty' => 2, 'explanation' => 'a = 7 memenuhi a > 5 (True). Untuk "and" bernilai True, b < 10 harus True, artinya b bisa bernilai apapun asalkan kurang dari 10.'],
            ['question' => 'Apa perbedaan antara "elif" dan "else" dalam Python?', 'options' => ['A. Tidak ada perbedaan', 'B. "elif" menambahkan kondisi tambahan, "else" menangani semua kondisi yang tersisa', 'C. "elif" dieksekusi setelah "else"', 'D. "else" harus digunakan sebelum "elif"'], 'answer' => 'B', 'difficulty' => 2, 'explanation' => '"elif" (else if) memungkinkan kita menambahkan kondisi baru yang diperiksa jika if sebelumnya False. "else" menangani semua kasus yang tidak ditangkap oleh if dan elif.'],
            // Level 3
            ['question' => 'Apa output dari kode berikut?\n```python\nx = 5\nhasil = "genap" if x % 2 == 0 else "ganjil"\nprint(hasil)\n```', 'options' => ['A. genap', 'B. ganjil', 'C. 5', 'D. True'], 'answer' => 'B', 'difficulty' => 3, 'explanation' => 'Ini adalah ternary expression (conditional expression). x = 5, 5 % 2 = 1, bukan 0, sehingga kondisi False dan nilai "ganjil" yang digunakan.'],
            ['question' => 'Apa yang dimaksud dengan "short-circuit evaluation"?', 'options' => ['A. Kondisi yang selalu True', 'B. Evaluasi berhenti lebih awal jika hasil sudah bisa ditentukan', 'C. Kondisi dalam satu baris', 'D. Loop yang berjalan hanya sekali'], 'answer' => 'B', 'difficulty' => 3, 'explanation' => 'Dalam "a and b", jika a False, Python tidak perlu evaluasi b (hasilnya pasti False). Dalam "a or b", jika a True, b tidak dievaluasi. Ini adalah short-circuit evaluation.'],
            ['question' => 'Apa output dari kode ini?\n```python\nx = 0\nprint("Truthy" if x else "Falsy")\n```', 'options' => ['A. Truthy', 'B. Falsy', 'C. 0', 'D. Error'], 'answer' => 'B', 'difficulty' => 3, 'explanation' => 'Dalam Python, nilai 0 dianggap "falsy". Nilai falsy meliputi: None, False, 0, "", [], {}, (). Maka kondisi "if x" dengan x=0 adalah False.'],
            // Level 4
            ['question' => 'Apa output dari nested if berikut?\n```python\nx, y = 5, 10\nif x > 0:\n    if y > x:\n        print("Y lebih besar")\n    else:\n        print("X lebih besar")\nelse:\n    print("X negatif")\n```', 'options' => ['A. Y lebih besar', 'B. X lebih besar', 'C. X negatif', 'D. Error'], 'answer' => 'A', 'difficulty' => 4, 'explanation' => 'x=5 > 0 (True), masuk ke if luar. y=10 > x=5 (True), masuk ke if dalam, cetak "Y lebih besar".'],
            ['question' => 'Dalam Python, mana yang equivalent dengan switch-case di bahasa lain?', 'options' => ['A. if-elif-else', 'B. match-case (Python 3.10+)', 'C. switch-when', 'D. A dan B benar'], 'answer' => 'D', 'difficulty' => 4, 'explanation' => 'Python menggunakan if-elif-else sebagai pengganti switch-case di versi lama. Python 3.10+ menambahkan match-case statement yang mirip switch. Keduanya adalah cara yang valid.'],
            ['question' => 'Apa output dari kode ini?\n```python\nx = 5\nif x > 3:\n    if x > 7:\n        print("A")\n    elif x > 4:\n        print("B")\n    else:\n        print("C")\nprint("D")\n```', 'options' => ['A. A D', 'B. B D', 'C. C D', 'D. D'], 'answer' => 'B', 'difficulty' => 4, 'explanation' => 'x=5>3 (True), masuk if luar. x=5>7 (False), skip. x=5>4 (True), cetak "B". Lanjut cetak "D" karena print("D") di luar if. Output: B dan D (di baris terpisah).'],
            // Level 5
            ['question' => 'Apa output dari kode kompleks ini?\n```python\ndef cek(x):\n    return "pos" if x > 0 else "nol" if x == 0 else "neg"\nprint(cek(-5))\n```', 'options' => ['A. pos', 'B. nol', 'C. neg', 'D. Error'], 'answer' => 'C', 'difficulty' => 5, 'explanation' => 'Ini adalah chained ternary expression. x=-5, x>0 False, lanjut ke x==0 yang juga False, maka return "neg".'],
            ['question' => 'Apa yang dilakukan kode ini?\n```python\nresult = [i for i in range(10) if i % 2 == 0]\n```', 'options' => ['A. Loop biasa dari 0-9', 'B. List comprehension yang mengambil angka genap dari 0-9', 'C. Mengecek apakah angka ganjil', 'D. Error karena syntax salah'], 'answer' => 'B', 'difficulty' => 5, 'explanation' => 'List comprehension dengan kondisi filter. Menghasilkan list [0, 2, 4, 6, 8] - angka genap dari range(10) yang memenuhi i % 2 == 0.'],
            ['question' => 'Manakah pernyataan yang BENAR tentang operator "walrus" (:=) di Python 3.8+?', 'options' => ['A. Sama dengan operator ==', 'B. Melakukan assignment sekaligus menggunakan nilainya dalam ekspresi yang sama', 'C. Hanya bisa digunakan dalam fungsi', 'D. Digunakan untuk deklarasi dictionary'], 'answer' => 'B', 'difficulty' => 5, 'explanation' => 'Operator walrus (:=) melakukan assignment dan return nilai sekaligus. Contoh: if (n := len(a)) > 10: print(f"List terlalu panjang: {n}"). n di-assign sekaligus digunakan dalam kondisi dan f-string.'],
        ];
    }

    private function perulanganQuestions(): array
    {
        return [
            // Level 1
            ['question' => 'Berapa kali loop ini berjalan?\n```python\nfor i in range(5):\n    print(i)\n```', 'options' => ['A. 4 kali', 'B. 5 kali', 'C. 6 kali', 'D. 1 kali'], 'answer' => 'B', 'difficulty' => 1, 'explanation' => 'range(5) menghasilkan angka 0, 1, 2, 3, 4 (5 angka). Loop berjalan 5 kali.'],
            ['question' => 'Apa kegunaan perintah "break" dalam loop?', 'options' => ['A. Melanjutkan ke iterasi berikutnya', 'B. Menghentikan loop sepenuhnya', 'C. Mengulangi iterasi yang sama', 'D. Tidak melakukan apa-apa'], 'answer' => 'B', 'difficulty' => 1, 'explanation' => '"break" langsung menghentikan eksekusi loop dan keluar dari loop tersebut.'],
            ['question' => 'Apa output dari kode ini?\n```python\nfor i in range(3):\n    print("Hello")\n```', 'options' => ['A. Hello', 'B. Hello Hello Hello', 'C. Hello dicetak 3 kali di baris terpisah', 'D. 0 1 2'], 'answer' => 'C', 'difficulty' => 1, 'explanation' => 'Loop berjalan 3 kali (i = 0, 1, 2), setiap iterasi mencetak "Hello" di baris baru.'],
            // Level 2
            ['question' => 'Apa perbedaan antara "break" dan "continue"?', 'options' => ['A. Tidak ada perbedaan', 'B. "break" menghentikan loop, "continue" melewati iterasi saat ini dan lanjut ke berikutnya', 'C. "continue" menghentikan loop, "break" melewati iterasi', 'D. "break" hanya untuk while, "continue" hanya untuk for'], 'answer' => 'B', 'difficulty' => 2, 'explanation' => '"break" keluar dari loop sepenuhnya. "continue" melewati sisa kode di iterasi saat ini dan langsung lanjut ke iterasi berikutnya.'],
            ['question' => 'Apa output dari kode ini?\n```python\ni = 0\nwhile i < 3:\n    print(i)\n    i += 1\n```', 'options' => ['A. 0 1 2 3', 'B. 1 2 3', 'C. 0 1 2', 'D. Infinite loop'], 'answer' => 'C', 'difficulty' => 2, 'explanation' => 'Loop while berjalan selama i < 3. Dimulai dari i=0: cetak 0, i jadi 1; cetak 1, i jadi 2; cetak 2, i jadi 3; kondisi 3<3 False, loop berhenti.'],
            ['question' => 'Apa output dari kode ini?\n```python\nfor i in range(5):\n    if i == 3:\n        break\n    print(i)\n```', 'options' => ['A. 0 1 2 3 4', 'B. 0 1 2', 'C. 0 1 2 3', 'D. 3 4'], 'answer' => 'B', 'difficulty' => 2, 'explanation' => 'Loop berjalan, cetak i=0, 1, 2. Saat i=3, kondisi break terpenuhi, loop berhenti. 3 tidak tercetak karena break dipanggil sebelum print.'],
            // Level 3
            ['question' => 'Apa output dari nested loop ini?\n```python\nfor i in range(3):\n    for j in range(2):\n        print(i, j)\n```\nBerapa total baris output?', 'options' => ['A. 3 baris', 'B. 2 baris', 'C. 6 baris', 'D. 5 baris'], 'answer' => 'C', 'difficulty' => 3, 'explanation' => 'Outer loop (i) berjalan 3 kali, inner loop (j) berjalan 2 kali untuk setiap i. Total = 3 × 2 = 6 kombinasi (i,j): (0,0), (0,1), (1,0), (1,1), (2,0), (2,1).'],
            ['question' => 'Bagaimana cara iterasi dictionary di Python?\n```python\nd = {"a": 1, "b": 2}\n```', 'options' => ['A. for i in d: (iterasi key)', 'B. for i in d.values(): (iterasi value)', 'C. for k, v in d.items(): (iterasi key dan value)', 'D. Semua jawaban benar'], 'answer' => 'D', 'difficulty' => 3, 'explanation' => 'Semua cara valid! for k in d: memberikan key. for v in d.values(): memberikan value. for k, v in d.items(): memberikan key dan value sekaligus (tuple unpacking).'],
            ['question' => 'Apa output dari kode ini?\n```python\nfor i in range(1, 10, 2):\n    print(i, end=" ")\n```', 'options' => ['A. 1 2 3 4 5 6 7 8 9', 'B. 1 3 5 7 9', 'C. 2 4 6 8', 'D. 1 2 3 4 5'], 'answer' => 'B', 'difficulty' => 3, 'explanation' => 'range(1, 10, 2) menghasilkan angka mulai dari 1, sampai kurang dari 10, dengan step 2: 1, 3, 5, 7, 9. end=" " membuat output dalam satu baris.'],
            // Level 4
            ['question' => 'Apa output dari kode ini?\n```python\nresult = sum(i**2 for i in range(1, 4))\nprint(result)\n```', 'options' => ['A. 6', 'B. 9', 'C. 14', 'D. 36'], 'answer' => 'C', 'difficulty' => 4, 'explanation' => 'Generator expression: i**2 untuk i=1,2,3 menghasilkan 1, 4, 9. sum(1, 4, 9) = 14.'],
            ['question' => 'Apa yang dilakukan perintah "enumerate" dalam loop?\n```python\nfor idx, val in enumerate(["a","b","c"]):\n    print(idx, val)\n```', 'options' => ['A. Hanya mengambil index', 'B. Hanya mengambil value', 'C. Memberikan index dan value sekaligus', 'D. Menghitung panjang list'], 'answer' => 'C', 'difficulty' => 4, 'explanation' => 'enumerate() mengembalikan pasangan (index, value) untuk setiap elemen. Output: 0 a, 1 b, 2 c.'],
            ['question' => 'Apa output dari kode ini?\n```python\ndata = [1, 2, 3, 4, 5]\nresult = [x for x in data if x % 2 != 0]\nprint(result)\n```', 'options' => ['A. [2, 4]', 'B. [1, 3, 5]', 'C. [1, 2, 3, 4, 5]', 'D. []'], 'answer' => 'B', 'difficulty' => 4, 'explanation' => 'List comprehension dengan filter x % 2 != 0 (angka ganjil). Dari [1,2,3,4,5], yang memenuhi adalah 1, 3, 5.'],
            // Level 5
            ['question' => 'Bagaimana cara membuat infinite loop yang bisa dihentikan?\n```python\nwhile True:\n    data = input("Masukkan angka (q untuk keluar): ")\n    if data == "q":\n        break\n    print(int(data) * 2)\n```\nApa yang terjadi jika user input "5"?', 'options' => ['A. Loop berhenti', 'B. Mencetak 10 dan loop berlanjut', 'C. Mencetak 5', 'D. Error'], 'answer' => 'B', 'difficulty' => 5, 'explanation' => 'Input "5" != "q", jadi tidak break. int("5") * 2 = 10, dicetak. Loop berlanjut menunggu input berikutnya.'],
            ['question' => 'Apa konsep "generator" dalam Python dan bagaimana hubungannya dengan loop?', 'options' => ['A. Generator adalah jenis loop khusus', 'B. Generator adalah fungsi yang menggunakan "yield" untuk menghasilkan nilai satu per satu, lebih hemat memori', 'C. Generator sama dengan list comprehension', 'D. Generator hanya bisa digunakan dengan while loop'], 'answer' => 'B', 'difficulty' => 5, 'explanation' => 'Generator menggunakan "yield" untuk menghasilkan nilai satu per satu (lazy evaluation). Tidak menyimpan semua nilai di memori sekaligus, sehingga efisien untuk data besar.'],
            ['question' => 'Apa output dari kode berikut?\n```python\ndef gen():\n    for i in range(3):\n        yield i * 2\n\nfor x in gen():\n    print(x, end=" ")\n```', 'options' => ['A. 0 1 2', 'B. 0 2 4', 'C. 2 4 6', 'D. Error'], 'answer' => 'B', 'difficulty' => 5, 'explanation' => 'Generator gen() menghasilkan i*2 untuk i=0,1,2: yaitu 0, 2, 4. Dicetak dengan spasi: "0 2 4".'],
        ];
    }

    private function fungsiQuestions(): array
    {
        return [
            // Level 1
            ['question' => 'Bagaimana cara mendefinisikan fungsi di Python?', 'options' => ['A. function nama():', 'B. def nama():', 'C. func nama():', 'D. define nama():'], 'answer' => 'B', 'difficulty' => 1, 'explanation' => 'Fungsi di Python didefinisikan menggunakan keyword "def" diikuti nama fungsi dan tanda kurung.'],
            ['question' => 'Apa output dari kode ini?\n```python\ndef sapa():\n    print("Halo!")\nsapa()\n```', 'options' => ['A. sapa', 'B. Halo!', 'C. def sapa', 'D. Tidak ada output'], 'answer' => 'B', 'difficulty' => 1, 'explanation' => 'sapa() memanggil fungsi yang mencetak "Halo!".'],
            ['question' => 'Apa kegunaan keyword "return" dalam fungsi?', 'options' => ['A. Memulai eksekusi fungsi', 'B. Mengakhiri program', 'C. Mengembalikan nilai dari fungsi ke pemanggil', 'D. Mencetak nilai'], 'answer' => 'C', 'difficulty' => 1, 'explanation' => '"return" mengembalikan nilai dari fungsi. Setelah return, eksekusi fungsi berhenti dan nilai dikembalikan ke pemanggil.'],
            // Level 2
            ['question' => 'Apa output dari kode ini?\n```python\ndef tambah(a, b):\n    return a + b\nhasil = tambah(3, 4)\nprint(hasil)\n```', 'options' => ['A. a + b', 'B. 34', 'C. 7', 'D. Error'], 'answer' => 'C', 'difficulty' => 2, 'explanation' => 'Fungsi tambah menerima a=3 dan b=4, mengembalikan 3+4=7. Hasil disimpan dan dicetak.'],
            ['question' => 'Apa yang dimaksud dengan "default parameter"?', 'options' => ['A. Parameter yang wajib diisi', 'B. Parameter dengan nilai bawaan jika tidak diisi saat pemanggilan', 'C. Parameter pertama dari fungsi', 'D. Parameter yang selalu bernilai None'], 'answer' => 'B', 'difficulty' => 2, 'explanation' => 'Default parameter memiliki nilai bawaan. Contoh: def sapa(nama="Teman"): - jika dipanggil sapa() tanpa argumen, nama akan bernilai "Teman".'],
            ['question' => 'Apa output dari kode ini?\n```python\ndef cek(x, pesan="OK"):\n    return f"{x}: {pesan}"\nprint(cek(5))\n```', 'options' => ['A. 5', 'B. 5: OK', 'C. cek(5)', 'D. Error'], 'answer' => 'B', 'difficulty' => 2, 'explanation' => 'pesan memiliki default value "OK". Memanggil cek(5) tanpa argumen kedua menggunakan nilai default, menghasilkan "5: OK".'],
            // Level 3
            ['question' => 'Apa yang dimaksud dengan scope variabel dalam fungsi?', 'options' => ['A. Nama fungsi', 'B. Jumlah parameter', 'C. Area dimana variabel dapat diakses', 'D. Tipe return value'], 'answer' => 'C', 'difficulty' => 3, 'explanation' => 'Scope adalah area dimana variabel dapat diakses. Variabel lokal hanya bisa diakses dalam fungsi, variabel global bisa diakses dari mana saja.'],
            ['question' => 'Apa output dari kode ini?\n```python\ndef kali(*args):\n    result = 1\n    for x in args:\n        result *= x\n    return result\nprint(kali(2, 3, 4))\n```', 'options' => ['A. [2, 3, 4]', 'B. 9', 'C. 24', 'D. Error'], 'answer' => 'C', 'difficulty' => 3, 'explanation' => '*args memungkinkan fungsi menerima jumlah argument bebas sebagai tuple. 2 × 3 × 4 = 24.'],
            ['question' => 'Apa itu "lambda function"?', 'options' => ['A. Fungsi yang selalu return None', 'B. Fungsi anonim satu baris yang bisa dibuat dengan keyword lambda', 'C. Fungsi yang hanya menerima satu parameter', 'D. Fungsi yang dipanggil otomatis'], 'answer' => 'B', 'difficulty' => 3, 'explanation' => 'Lambda adalah fungsi anonim. Contoh: kali_dua = lambda x: x * 2. Berguna untuk fungsi sederhana satu ekspresi.'],
            // Level 4
            ['question' => 'Apa output dari kode ini?\n```python\ndef outer():\n    x = 10\n    def inner():\n        return x * 2\n    return inner()\nprint(outer())\n```', 'options' => ['A. 10', 'B. 20', 'C. Error - x tidak bisa diakses inner', 'D. inner()'], 'answer' => 'B', 'difficulty' => 4, 'explanation' => 'Ini adalah closure. inner() bisa mengakses variabel x dari scope outer() melalui "enclosing scope". x=10, inner() return 10*2=20.'],
            ['question' => 'Apa yang dimaksud dengan "higher-order function"?', 'options' => ['A. Fungsi yang berjalan lebih cepat', 'B. Fungsi yang menerima fungsi lain sebagai argumen atau mengembalikan fungsi', 'C. Fungsi dengan banyak parameter', 'D. Fungsi yang menggunakan *args'], 'answer' => 'B', 'difficulty' => 4, 'explanation' => 'Higher-order function memperlakukan fungsi sebagai first-class citizen. Contoh: map(), filter(), sorted() menerima fungsi sebagai argumen. Fungsi juga bisa mengembalikan fungsi lain.'],
            ['question' => 'Apa output dari kode ini?\n```python\ndef buat_penambah(n):\n    return lambda x: x + n\ntambah5 = buat_penambah(5)\nprint(tambah5(3))\n```', 'options' => ['A. 3', 'B. 5', 'C. 8', 'D. Error'], 'answer' => 'C', 'difficulty' => 4, 'explanation' => 'buat_penambah(5) mengembalikan fungsi lambda x: x + 5. tambah5 adalah fungsi tersebut. tambah5(3) = 3 + 5 = 8. Ini adalah contoh closure dan currying.'],
            // Level 5
            ['question' => 'Apa yang dilakukan kode ini?\n```python\nfrom functools import reduce\nhasil = reduce(lambda acc, x: acc + x, [1, 2, 3, 4, 5])\nprint(hasil)\n```', 'options' => ['A. 5', 'B. 15', 'C. [1,2,3,4,5]', 'D. Error'], 'answer' => 'B', 'difficulty' => 5, 'explanation' => 'reduce() mengaplikasikan fungsi secara kumulatif: ((((1+2)+3)+4)+5) = 15. Ini adalah functional programming pattern.'],
            ['question' => 'Apa yang dimaksud dengan "recursion" dan apa risikonya?', 'options' => ['A. Fungsi yang tidak return apapun', 'B. Fungsi yang memanggil dirinya sendiri, risiko: stack overflow jika tidak ada base case', 'C. Loop yang berjalan selamanya', 'D. Fungsi dengan banyak parameter'], 'answer' => 'B', 'difficulty' => 5, 'explanation' => 'Rekursi adalah fungsi yang memanggil dirinya. Harus ada base case untuk menghentikannya. Tanpa base case, stack akan penuh (RecursionError di Python).'],
            ['question' => 'Apa output dari fungsi rekursif ini?\n```python\ndef faktorial(n):\n    if n <= 1:\n        return 1\n    return n * faktorial(n - 1)\nprint(faktorial(4))\n```', 'options' => ['A. 4', 'B. 10', 'C. 24', 'D. 16'], 'answer' => 'C', 'difficulty' => 5, 'explanation' => 'faktorial(4) = 4 × faktorial(3) = 4 × 3 × faktorial(2) = 4 × 3 × 2 × faktorial(1) = 4 × 3 × 2 × 1 = 24.'],
        ];
    }

    private function arrayQuestions(): array
    {
        return [
            // Level 1
            ['question' => 'Bagaimana cara mengakses elemen pertama dari list di Python?\n```python\ndata = [10, 20, 30]\n```', 'options' => ['A. data[1]', 'B. data[0]', 'C. data.first()', 'D. data(0)'], 'answer' => 'B', 'difficulty' => 1, 'explanation' => 'Index array/list di Python dimulai dari 0. Elemen pertama diakses dengan data[0].'],
            ['question' => 'Bagaimana cara menambah elemen ke akhir list?', 'options' => ['A. list.add()', 'B. list.push()', 'C. list.append()', 'D. list.insert()'], 'answer' => 'C', 'difficulty' => 1, 'explanation' => '.append() menambahkan elemen ke akhir list. Contoh: data.append(40) akan menambah 40 ke akhir list data.'],
            ['question' => 'Apa output dari kode ini?\n```python\ndata = [1, 2, 3, 4, 5]\nprint(len(data))\n```', 'options' => ['A. 4', 'B. 5', 'C. 6', 'D. [1,2,3,4,5]'], 'answer' => 'B', 'difficulty' => 1, 'explanation' => 'len() mengembalikan panjang (jumlah elemen) dari list. data memiliki 5 elemen, jadi len(data) = 5.'],
            // Level 2
            ['question' => 'Apa output dari kode ini?\n```python\ndata = [10, 20, 30, 40, 50]\nprint(data[1:3])\n```', 'options' => ['A. [10, 20]', 'B. [20, 30]', 'C. [20, 30, 40]', 'D. [10, 20, 30]'], 'answer' => 'B', 'difficulty' => 2, 'explanation' => 'Slicing data[1:3] mengambil elemen dari index 1 (inklusif) sampai index 3 (eksklusif). Hasilnya index 1 dan 2, yaitu [20, 30].'],
            ['question' => 'Bagaimana cara menghapus elemen dari list berdasarkan nilai?', 'options' => ['A. list.delete(value)', 'B. list.remove(value)', 'C. del list[value]', 'D. list.pop(value)'], 'answer' => 'B', 'difficulty' => 2, 'explanation' => '.remove(value) menghapus kemunculan pertama dari nilai tersebut. Berbeda dengan del list[index] yang menghapus berdasarkan index, dan .pop() yang menghapus dan mengembalikan elemen.'],
            ['question' => 'Apa perbedaan antara list dan tuple di Python?', 'options' => ['A. Tidak ada perbedaan', 'B. List menggunakan [], mutable (bisa diubah); Tuple menggunakan (), immutable (tidak bisa diubah)', 'C. Tuple lebih lambat dari list', 'D. List tidak bisa menyimpan campuran tipe data'], 'answer' => 'B', 'difficulty' => 2, 'explanation' => 'List: [] bisa diubah (append, remove, dll). Tuple: () tidak bisa diubah setelah dibuat (immutable). Tuple lebih cepat dan hemat memori untuk data yang tidak perlu berubah.'],
            // Level 3
            ['question' => 'Apa output dari kode ini?\n```python\ndata = [[1,2], [3,4], [5,6]]\nprint(data[1][0])\n```', 'options' => ['A. 1', 'B. 3', 'C. 4', 'D. [3,4]'], 'answer' => 'B', 'difficulty' => 3, 'explanation' => 'data[1] mengakses elemen index 1 dari list luar, yaitu [3,4]. data[1][0] mengakses index 0 dari [3,4], yaitu 3.'],
            ['question' => 'Apa output dari kode ini?\n```python\ndata = [3, 1, 4, 1, 5, 9, 2, 6]\ndata.sort()\nprint(data[:3])\n```', 'options' => ['A. [3, 1, 4]', 'B. [1, 1, 2]', 'C. [9, 6, 5]', 'D. [1, 2, 3]'], 'answer' => 'B', 'difficulty' => 3, 'explanation' => 'sort() mengurutkan list secara ascending in-place: [1, 1, 2, 3, 4, 5, 6, 9]. [:3] mengambil 3 elemen pertama: [1, 1, 2].'],
            ['question' => 'Apa yang dilakukan fungsi "zip" pada list?\n```python\na = [1, 2, 3]\nb = ["a", "b", "c"]\nresult = list(zip(a, b))\n```', 'options' => ['A. Menggabungkan dua list menjadi satu list panjang', 'B. Membuat list of tuples dari elemen yang berpasangan', 'C. Mengkompresi list', 'D. Mengurutkan kedua list'], 'answer' => 'B', 'difficulty' => 3, 'explanation' => 'zip() menggabungkan elemen-elemen dari dua iterable menjadi tuple. result = [(1,"a"), (2,"b"), (3,"c")].'],
            // Level 4
            ['question' => 'Apa output dari kode ini?\n```python\ndata = [1, 2, 3, 4, 5]\nprint(data[::-1])\n```', 'options' => ['A. [5, 4, 3, 2, 1]', 'B. [1, 2, 3, 4, 5]', 'C. [-5, -4, -3, -2, -1]', 'D. Error'], 'answer' => 'A', 'difficulty' => 4, 'explanation' => 'Slicing dengan step -1 (data[::-1]) membalik urutan list. Menghasilkan [5, 4, 3, 2, 1].'],
            ['question' => 'Apa perbedaan antara list.sort() dan sorted(list)?', 'options' => ['A. Tidak ada perbedaan', 'B. sort() mengubah list asli (in-place), sorted() membuat list baru tanpa mengubah aslinya', 'C. sorted() lebih lambat', 'D. sort() mengembalikan list baru'], 'answer' => 'B', 'difficulty' => 4, 'explanation' => 'list.sort() memodifikasi list asli dan return None. sorted(list) membuat dan mengembalikan list baru yang sudah terurut, list asli tidak berubah.'],
            ['question' => 'Apa output dari kode ini?\n```python\ndata = [1, 2, 2, 3, 3, 3, 4]\nprint(list(set(data)))\n```\n(Catatan: urutan output bisa berbeda)', 'options' => ['A. [1, 2, 2, 3, 3, 3, 4]', 'B. {1, 2, 3, 4}', 'C. [1, 2, 3, 4] (urutan mungkin berbeda)', 'D. Error'], 'answer' => 'C', 'difficulty' => 4, 'explanation' => 'set() menghapus duplikat. list(set(data)) mengkonversi kembali ke list. Hasilnya [1, 2, 3, 4] tapi urutan tidak dijamin karena set tidak terurut.'],
            // Level 5
            ['question' => 'Apa output dari kode berikut?\n```python\nmatrix = [[i*j for j in range(1,4)] for i in range(1,4)]\nprint(matrix[2][1])\n```', 'options' => ['A. 4', 'B. 6', 'C. 9', 'D. 3'], 'answer' => 'B', 'difficulty' => 5, 'explanation' => 'matrix adalah: [[1,2,3],[2,4,6],[3,6,9]]. matrix[2] adalah [3,6,9]. matrix[2][1] adalah 6.'],
            ['question' => 'Apa yang terjadi ketika kode ini dieksekusi?\n```python\na = [1, 2, 3]\nb = a.copy()\na.append(4)\nprint(len(a), len(b))\n```', 'options' => ['A. 4 4', 'B. 4 3', 'C. 3 3', 'D. Error'], 'answer' => 'B', 'difficulty' => 5, 'explanation' => '.copy() membuat shallow copy dari list. b adalah list baru yang independent. Append ke a tidak mempengaruhi b. len(a)=4, len(b)=3.'],
            ['question' => 'Apa perbedaan antara "shallow copy" dan "deep copy" untuk list of lists?', 'options' => ['A. Tidak ada perbedaan', 'B. Shallow copy: list baru tapi elemen-elemen dalam masih refer ke objek yang sama; Deep copy: semua level di-copy secara independen', 'C. Deep copy lebih cepat dari shallow copy', 'D. Shallow copy menggunakan .copy(), deep copy menggunakan ='], 'answer' => 'B', 'difficulty' => 5, 'explanation' => 'Untuk nested list: a.copy() membuat list baru tapi sub-list masih shared. copy.deepcopy(a) membuat copy total di semua level. Mengubah sub-list di shallow copy mempengaruhi aslinya!'],
        ];
    }
}
