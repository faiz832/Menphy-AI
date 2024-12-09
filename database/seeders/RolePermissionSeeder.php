<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $userRole = Role::create([
            'name' => 'user'
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole($adminRole);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')
        ]);

        $user->assignRole($userRole);

        $articles = [
            [
                'title' => 'Kesehatan Mental',
                'content' => 'Kesehatan mental adalah aspek penting dalam kehidupan yang seringkali terabaikan. Secara sederhana, kesehatan mental mengacu pada kondisi emosional, psikologis, dan sosial seseorang yang memengaruhi cara berpikir, merasa, dan bertindak. Hal ini juga memengaruhi bagaimana seseorang menangani stres, berinteraksi dengan orang lain, dan membuat keputusan. Sama halnya dengan kesehatan fisik, kesehatan mental membutuhkan perhatian dan perawatan yang tepat agar seseorang dapat menjalani hidup secara optimal.

Dalam kehidupan sehari-hari, berbagai faktor dapat memengaruhi kesehatan mental, seperti tekanan pekerjaan, masalah keluarga, atau pengalaman traumatis. Tanda-tanda kesehatan mental yang terganggu bisa berupa perasaan cemas berlebihan, kesedihan berkepanjangan, sulit tidur, hingga kesulitan menjalankan aktivitas sehari-hari. Sayangnya, banyak orang enggan mencari bantuan karena stigma yang masih melekat pada masalah kesehatan mental, sehingga kondisi ini sering dibiarkan hingga menjadi lebih serius.

Penting untuk memahami bahwa kesehatan mental adalah bagian dari kesejahteraan kita secara keseluruhan. Melakukan langkah-langkah sederhana seperti berbicara dengan orang yang dipercaya, meluangkan waktu untuk diri sendiri, atau menjaga pola hidup sehat dapat membantu menjaga kesehatan mental. Jika masalah dirasa terlalu berat, berkonsultasi dengan psikolog atau psikiater adalah langkah yang bijaksana. Bantuan profesional bisa memberikan pemahaman lebih mendalam dan strategi untuk mengatasi masalah yang dihadapi.

Selain itu, mendukung orang-orang di sekitar kita juga memiliki peran penting dalam kesehatan mental. Mendengarkan tanpa menghakimi, menunjukkan empati, dan membantu mereka merasa tidak sendirian dapat memberikan dampak positif yang besar. Edukasi tentang kesehatan mental juga perlu ditingkatkan agar masyarakat lebih terbuka dan memahami bahwa mencari bantuan adalah tanda kekuatan, bukan kelemahan.

Pada akhirnya, memahami kesehatan mental adalah tentang menyadari bahwa setiap orang memiliki hak untuk merasa bahagia dan sehat, baik secara fisik maupun emosional. Dengan memberikan perhatian yang cukup pada kesehatan mental, kita tidak hanya menjaga keseimbangan dalam hidup, tetapi juga membantu menciptakan lingkungan yang lebih mendukung dan penuh empati bagi semua orang.',
                'image' => 'assets/images/article-1.jpg',
            ],
            [
                'title' => 'Pentingnya Merawat Diri',
                'content' => 'Di era yang serba cepat seperti sekarang, merawat diri atau self-care menjadi semakin penting. Self-care adalah praktik menyisihkan waktu untuk memberi perhatian pada kesehatan mental, emosional, dan fisik kita. Meskipun terdengar sederhana, banyak orang sering mengabaikan hal ini karena kesibukan, tanggung jawab, atau bahkan anggapan bahwa merawat diri sendiri itu egois. Padahal, self-care adalah langkah penting untuk menjaga keseimbangan hidup dan mencapai kebahagiaan.

Merawat diri bukan hanya tentang liburan mewah atau pergi ke spa. Self-care mencakup berbagai aktivitas yang mendukung kesehatan secara menyeluruh, seperti tidur yang cukup, makan makanan bergizi, rutin berolahraga, dan menetapkan batasan untuk melindungi waktu pribadi. Hal-hal sederhana seperti meluangkan waktu untuk hobi, bermeditasi, atau bahkan istirahat sejenak dari media sosial juga termasuk bentuk self-care yang efektif.

Salah satu manfaat utama dari self-care adalah mencegah stres yang berlebihan. Ketika kita terlalu sibuk dan lupa merawat diri, tubuh dan pikiran kita menjadi lebih rentan terhadap tekanan, kecemasan, bahkan kelelahan. Dengan melakukan self-care, kita memberikan ruang bagi tubuh dan pikiran untuk pulih, sehingga dapat menghadapi tantangan sehari-hari dengan lebih baik.

Selain itu, self-care juga berdampak positif pada hubungan sosial kita. Ketika kita merasa lebih sehat dan bahagia, kita menjadi lebih mampu memberikan perhatian dan dukungan kepada orang-orang di sekitar. Sebaliknya, jika kita terus-menerus mengabaikan kebutuhan diri, kita cenderung menjadi mudah marah, lelah, dan kurang produktif dalam berbagai aspek kehidupan.

Merawat diri adalah investasi untuk masa depan kita. Dengan memahami pentingnya self-care, kita dapat mulai mengintegrasikan kebiasaan-kebiasaan sehat ke dalam rutinitas harian. Ingatlah, merawat diri bukanlah tanda kelemahan, melainkan bentuk cinta pada diri sendiri yang akan membantu kita menjalani hidup dengan lebih bermakna.',
                'image' => 'assets/images/article-2.jpg',
            ],
            [
                'title' => 'Mengenali Gejala Depresi',
                'content' => 'Depresi adalah salah satu gangguan mental yang sering kali sulit dikenali, baik oleh penderitanya sendiri maupun oleh orang di sekitarnya. Depresi bukan sekadar merasa sedih atau lelah, melainkan kondisi serius yang dapat memengaruhi cara seseorang berpikir, merasakan, dan beraktivitas. Dengan memahami gejala depresi, kita dapat memberikan dukungan yang lebih baik, baik untuk diri sendiri maupun orang lain yang mungkin mengalaminya.

Salah satu gejala utama depresi adalah perasaan sedih yang berkepanjangan atau kehilangan minat pada aktivitas yang sebelumnya dinikmati. Orang yang mengalami depresi sering merasa hampa, tidak berharga, atau putus asa. Mereka juga mungkin menarik diri dari lingkungan sosial dan merasa sulit untuk menjalani rutinitas harian. Gejala ini dapat berlangsung selama berminggu-minggu atau bahkan berbulan-bulan tanpa membaik.

Selain perubahan suasana hati, depresi juga dapat berdampak pada kondisi fisik. Beberapa tanda fisik yang sering muncul meliputi gangguan tidur seperti insomnia atau tidur berlebihan, penurunan atau peningkatan nafsu makan, serta rasa lelah yang tidak wajar. Penderita juga dapat mengalami masalah konsentrasi dan sulit membuat keputusan, bahkan untuk hal-hal kecil sekalipun.

Gejala depresi juga bisa muncul dalam bentuk pikiran negatif, seperti rasa bersalah yang berlebihan atau pemikiran bahwa hidup tidak lagi bermakna. Dalam kasus yang lebih parah, depresi dapat memicu pikiran untuk menyakiti diri sendiri atau bahkan bunuh diri. Jika gejala seperti ini muncul, sangat penting untuk segera mencari bantuan dari profesional kesehatan mental.

Mengenali gejala depresi adalah langkah pertama untuk mengatasinya. Jika Anda atau orang terdekat Anda menunjukkan tanda-tanda depresi, jangan ragu untuk mencari bantuan. Konsultasi dengan psikolog atau psikiater dapat membantu dalam mendiagnosis kondisi ini dan menemukan strategi penanganan yang tepat. Ingatlah bahwa depresi adalah kondisi yang bisa diobati, dan dukungan dari keluarga, teman, serta tenaga profesional sangat penting untuk proses pemulihan.',
                'image' => 'assets/images/article-3.jpg',
            ],
            [
                'title' => 'Menjaga Kesehatan Mental',
                'content' => 'Di era digital yang serba cepat ini, kesehatan mental menjadi salah satu aspek yang paling rentan terpengaruh. Teknologi, media sosial, dan akses informasi yang tanpa batas memang memberikan banyak manfaat, tetapi juga membawa tekanan tersendiri. Ketergantungan pada gawai dan media sosial sering kali membuat kita kehilangan keseimbangan antara dunia digital dan kehidupan nyata.

Salah satu tantangan terbesar adalah tekanan untuk selalu terlihat sempurna di media sosial. Banyak orang merasa harus terus-menerus memperlihatkan sisi terbaik mereka, yang akhirnya dapat memicu rasa cemas, rendah diri, atau bahkan depresi. Hal ini terjadi karena media sosial sering kali hanya menampilkan "highlight" kehidupan seseorang, sementara perjuangan atau masalah yang mereka hadapi jarang terlihat.

Selain itu, paparan berita yang berlebihan juga dapat berdampak negatif pada kesehatan mental. Terlalu banyak membaca atau menonton berita, terutama yang bersifat negatif, dapat menyebabkan stres dan kecemasan. FOMO (fear of missing out) atau rasa takut ketinggalan informasi sering membuat kita terus-menerus memeriksa ponsel, sehingga mengurangi waktu untuk beristirahat atau melakukan hal yang lebih bermakna.

Untuk menjaga kesehatan mental di era digital, penting bagi kita untuk menetapkan batasan. Luangkan waktu untuk detoks digital, seperti mengurangi waktu di media sosial atau mematikan notifikasi aplikasi selama beberapa jam setiap hari. Gunakan teknologi secara bijak dengan fokus pada hal-hal yang mendukung pertumbuhan pribadi, seperti membaca buku digital atau mengikuti kursus online yang bermanfaat.

Ingatlah bahwa dunia digital seharusnya menjadi alat yang mendukung kehidupan, bukan mendikte cara kita hidup. Dengan menjaga keseimbangan antara aktivitas online dan offline, kita dapat melindungi kesehatan mental sekaligus tetap menikmati manfaat teknologi. Luangkan waktu untuk terhubung dengan orang-orang terdekat secara langsung, dan jangan ragu untuk mencari bantuan jika merasa terlalu tertekan oleh dunia digital.',
                'image' => 'assets/images/article-4.jpg',
            ],
        ];

        foreach ($articles as $index => $article) {
            Article::create([
                'user_id' => $admin->id,
                'title' => $article['title'],
                'content' => $article['content'],
                'image' => $article['image'],
                'created_at' => now()->subDays($index * 2), // This will create articles with different creation dates
            ]);
        }
    }
}
