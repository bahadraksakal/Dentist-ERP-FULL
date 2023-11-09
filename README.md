# Enterprise Resource Planning Web App For Dentists

### Ahmet Bahadır Aksakal

#### 20360859079

****

- [EN : Description :book: :leftwards_arrow_with_hook:](#en)  
- [TR : Açıklama :book: :leftwards_arrow_with_hook:](#tr)

****

#### [EN]

## 2nd Grade Spring Semester Web Programming Project Final

###### [Bahox Dentist ERP Webhost000 Site](https://bahoxdentisterp.000webhostapp.com/)

1. ### Technology and Languages Used in the Project:
    
     * **Php - No Framework Used**
     * **MySql**
     * **JavaScript**
     * **Ajax**
     * **Jquery**
     * **Bootstrap 5.0**
     * **CloudTables - DataTables**
     * **Css**
       
2. ### Purpose and Use of the Project:
    
     * An attempt has been made to create a product in which all transactions of patients coming to the dentist, all examinations, authorized doctors and personnel are recorded and monitored.
     * Doctors can view each examination of all patients so far, make relevant changes, and see whether the patient has paid.
     * The amount a patient will pay is calculated as follows: Additional Procedure Fee + Prices entered separately for all Teeth.
     * If the company wishes, due to workload or other reasons, the total fee may be included in the additional processing fee and a separate fee for the teeth may not be included.
     * You can make the business tracking process more detailed in the program, or you can reduce the time you spend on business process tracking by entering different fields with collected data without entering the details.
     * Customers can register to the application via the website, view all examinations and procedures performed on their teeth separately during each examination, and make payments as they wish.
     * In the project, great attention was paid to SQL injection and all necessary security rules.
     * The project is a demo, there are some buttons that do not work and are indicated on the application screen. There are a few pages that have never been added.
     * The project has a flexible structure and many things can be added or updated later.

3. ### Project Setup, Run and Additional Details Video:

     Install the program called Xammp and you can get help from YouTube when you get stuck.
    
     Install the program called Mysql WorkBench and you can get help from YouTube when you get stuck.
    
     Connect mysql workbench to local database running on xammp.
    
     After performing the above steps, download the file with [.sql extension from the repository.](https://github.com/bahadraksakal/Dentist-ERP-FULL/blob/main/proje%20dentist%20erp.sql)
    
     Run the sql script you downloaded via mysql workbench. And our database is ready.
    
     Delete the file you downloaded and all the files in the folder named htdocs in the directory where XAMMP is installed.
    
     [Download the project file that I gave in my repo](https://github.com/bahadraksakal/Dentist-ERP-FULL/tree/main/Proje-Dentist-ERP-Bahox-Software)
    
     Copy the file you downloaded into the folder named htdocs in the directory where XAMMP is installed.
    
     Run xammp.exe and make sure both mysql and apache are started.
    
     You can now access the Web-Api from [http://localhost/Proje-Dentist-ERP-Bahox-Software/](http://localhost/Proje-Dentist-ERP-Bahox-Software/).
    
     Note: For detailed usage and explanation, download and watch the [video](https://github.com/bahadraksakal/Dentist-ERP-FULL/blob/main/dentist-erp-tanitim-kurulum.mp4)

4. ### Images:
    
    *   ![](proje-tanitim-img-video/dentist-erp-musteri-kayit.png)
    *   ![](proje-tanitim-img-video/dentist-erp-musteri-anasayfa.png)
    *   ![](proje-tanitim-img-video/dentist-erp-musteri-borcOdeme.png)
    *   ![](proje-tanitim-img-video/dentist-erp-musteri-borcOdemeErr.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-kayit.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-anasayfa.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-musGuncelle.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-musGuncelleErr.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-musSil.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-musGit.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-musDisDetay.png)
       

****
****


#### [TR]

## 2\. Sınıf Bahar Dönemi Web Programlama Projem Final

###### [Bahox Dentist ERP Webhost000 Site](https://bahoxdentisterp.000webhostapp.com/)

1.  ### Projede Kullanılan Teknoloji Ve Diller:
    
    *   **Php - Herhangi Bir Framework Kullanılmamıştır**
    *   **MySql**
    *   **JavaScript**
    *   **Ajax**
    *   **Jquery**
    *   **Bootstrap 5.0**
    *   **CloudTables - DataTables**
    *   **Css**
2.  ### Projenin Amacı ve Kullanımı:
    
    *   Dişçiye gelen hastaların, tüm muayenelerin, yetkili doktorlarınve personellerin tüm işlemlerinin kayıt altına alınıp takip edildiği bir ürün ortaya konmaya çalışılmıştır.
    *   Doktorlar şimdiye kadar gelen tüm hastaların her bir muayenesini görüntüleyebilir, ilgili değişkiliği yapabilir ve hastanın ödeme yapıp yapmadığını görebilir.
    *   Bir hastanın ödeme yapacağı miktar şu şekilde hesaplanır: Ek İşlem Ücreti + Tüm Dişler İçin ayrı ayrı girilmiş fiyatlar.
    *   Firma dilerse iş yoğunluğu yada farklı sebeplerden total ücreti ek işlem ücretine girip dişler için ayrı ayrı ücret girmeyebilir.
    *   Programda iş takip sürecini daha detaylı bir hale getirebilirsiniz yada detayları girmeden farklı alanları verileri toplanmış olarak girerek iş süreç takibine ayırdığınız zamanı azaltabilirsiniz.
    *   Müşteriler internet sitesi üzerinden uygulamaya kayıt olup, tüm muyaneleri ve her bir muayenede dişlerine uygulunan işlemleri ayrı ayrı görüntüleyip dilediği gibi ödeme yapabilir.
    *   Projede sql injection ve gerekli tüm güvenlik kurallarına fazlasıyla dikkat edilmiştir.
    *   Proje demo'dur çalışmayan bazı butonlar vardır ve uygulama ekranında belirtilmiştir. Hiç Eklenmemiş bir kaç sayfada vardır.
    *   Proje esnek bir yapıdadır bir çok şey sonradan eklenebilir yada güncellenebilir.

3.  ### Proje Kurulumu Çalıştırılması ve Ek Detaylar Video:

    Xammp isimli programı yükleyin takıldığınız yerlerde youtube dan yardım alabilirsiniz.
    
    Mysql WorkBench isimli programı yükleyin takıldığınız yerlerde youtube dan yardım alabilirsiniz.
    
    Mysql workbench'i xammp üzerinde çalışan local veritabanına bağlayın.
    
    Yukarıdaki işlemleri yaptıktan sonra [.sql uzantılı dosyayı repomdan indirin.](https://github.com/bahadraksakal/Dentist-ERP-FULL/blob/main/proje%20dentist%20erp.sql)
    
    İndirdiğiniz sql scriptini , mysql workbench üzerinden çalıştırın. Ve veritabanımız hazır.
    
    İndirdiğiniz dosyayı XAMMP nin kurulu olduğu dizindeki htdocs isimli klasörün içindeki tüm dosyaları silin.
    
    Repomda vermiş olduğum [proje dosyasını repomdan indiriniz](https://github.com/bahadraksakal/Dentist-ERP-FULL/tree/main/Proje-Dentist-ERP-Bahox-Software)
    
    İndirdiğiniz dosyayı XAMMP nin kurulu olduğu dizindeki htdocs isimli klasörün içine kopyalayın.
    
    Xammp.exe yi çalıştırın hem mysql hemde apachenin start edildiğinden emin olun.
    
    Artık [http://localhost/Proje-Dentist-ERP-Bahox-Software/](http://localhost/Proje-Dentist-ERP-Bahox-Software/) adresinden Web-Api ye erişebilirsiniz.
    
    Not: Detaylı kullanım ve anlatım için [videoyu](https://github.com/bahadraksakal/Dentist-ERP-FULL/blob/main/dentist-erp-tanitim-kurulum.mp4) indirip izleyin

4.  ### Görseller:
    
    *   ![](proje-tanitim-img-video/dentist-erp-musteri-kayit.png)
    *   ![](proje-tanitim-img-video/dentist-erp-musteri-anasayfa.png)
    *   ![](proje-tanitim-img-video/dentist-erp-musteri-borcOdeme.png)
    *   ![](proje-tanitim-img-video/dentist-erp-musteri-borcOdemeErr.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-kayit.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-anasayfa.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-musGuncelle.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-musGuncelleErr.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-musSil.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-musGit.png)
    *   ![](proje-tanitim-img-video/dentist-erp-yetkili-musDisDetay.png)
