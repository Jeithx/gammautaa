<?php
echo "contact.php çalışıyor.";

if(isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['message'])) {
    // Form verilerini güvenli hale getirmek için HTML özel karakterlerini temizleyelim
    $name = htmlspecialchars($_POST['name']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Size gelecek mailin gideceği adresi belirleyin
    $to = "jeithx@gmail.com"; // Kendi mail adresinizi yazın

    // E-posta başlığı
    $email_subject = "İletişim Formu: $subject";

    // E-posta içeriği
    $email_body = "Ad: $name\n".
                  "Konu: $subject\n".
                  "Mesaj: $message\n";

    // Gönderici bilgisi (hosting gereksinimlerine göre from adresi)
    $headers = "From: noreply@gammautaa.com.tr\r\n"; 
    // Yukarıdaki "ornekdomain.com" yerine kendi domaininizi yazın.
    // Bazı hostinglerde "noreply@domain.com" gibi bir mail kullanmanız gerekebilir.

    // Mail fonksiyonunu kullanarak gönderim
    if(mail($to, $email_subject, $email_body, $headers)) {
        echo "Mesajınız başarıyla gönderildi, teşekkür ederiz!";
    } else {
        echo "Gönderim sırasında bir hata oluştu. Lütfen daha sonra tekrar deneyin.";
    }
} else {
    echo "Lütfen form alanlarını doldurunuz.";
}
?>
