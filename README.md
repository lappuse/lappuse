PAKET İŞLEMLERİ

	- YÜKLE 
		Yüklenen paketin 

	- KALDIR
	- GÜNCELLE
	- YENİDEN YÜKLE


PAKET TİPLERİ
	- lappuse-plugin
	- lappuse-theme


	Framework altında çalışacak olan 3 tip modül bulunmakta. 
	Bunlardan biri tema modülleri. View katmanıyla ilgili olup kendisi bir servis sağlayıcı modülüdür. 
	Bir diğeri ise plugin modülü olup içerisinde view katmanından direk olarak erişilebilecek sınıflara sahiptir. Bunlar controller, widget, component vb. Kendisi tower için servis sağlayıcı modülüdür. 
	Aynı zaman da bir başka modül var ki bunlarda direk olarak container için bir servisleri ihtiva ederler. İçerisinde view yada view üzerinden erişilebilecek başkaca bir sınıf yada servis sunmazlar. 
	Bu modül için bir anlatım ve isimlendirme klavuzu olması gerekmekte.
	Yukarıda sayılan 3 modülde tower üzerinden kayda geçirildiği için bu üç modülün kendine ait işlevleri ve sundukları olsada, bir tip modülün sunduğu tüm olanakları bir başka modülde sunabilir. 
	İşte burada, bu bir standarda oturtabilmek adına üzerinde iyice düşünüp bir kalıp mantığını kurgulamak gerekmektedir. 
	Theme modülü en basit şekilde anlatılabilecek bir modüldür. 
	Plugin modülü de anlatımı hafif şekilde karışık olan bir modüldür. Plugin üzerinden container servisleri sunulabilecekse, son modüle aslında ihtiyaç bulunmuyor. 
	Ancak modüllerin evrenselliğinden bahsediyorsak, conteynır servisini ihtiva eden paketleri belli bir tip dayatmasına sokmak doğru değildir. 
	Örneğin, Image sınıfı evrensel bir paket olmasına karşın, içerisinde laravel için de bir servis sağlayıcı konulmuş. Böylece bu paket hem laravel de kullanılabilir hemde başka frameworkler de kullanılabilir. Ancak plugin modülleri controller içerdiğinden her projede kullanılabilecek tip de yapılar değillerdir. 

	O halde, biz direk olarak evrensel yazılan sınıfları tip dayatması yapılmadan lappuse-library olarak isimlendirelim. Şöyle ki, plugin ve theme dışında eklenen bir paket içerisinde lappuse için bir servis provider bildirilmişse bunun kaydını tutmakta fayda vardır.

	Tipik bir library, container için bir servis ve yapılandırma dosyası olan configi ihtiva eder.
	Plugin ise, container için bir servis ihtiva etmesinden çok web için diğer servisleri ihtiva ederler ve bunlar framework etrafında web paketleri olarak dağıtıma girerler.

	Ana Paketler = lappuse-library GELİŞTİRİCİLER
	Web Paketleri = lappuse-plugin	BACKEND
	Görüntü paketleri = lappuse-theme 	FRONTEND




	$this->container->get('lappuse.foundation::cache')

LIBRARY
 	- http
 	- container
 	- cache
 	- 

Paket İşlenme Sıralama,
	* COMPOSER GÖREVLERİ
	- Tip kontrolü
	- Klasöre ayırma işlemi

	* TOWER GÖREVLERİ
	- Servis Provider kayıtlarını oluşturma.
	- Migration ve Seeder
	- Configirasyon

Paket yükleme işlemi, hem composer açısından hemde tower açısından gerçekleşir. 


PAKET KURULUM İŞLEMLERİ:
	Tip kontrolünden geçerek ilgili installer sınıfına gelen paketlerin kurulum işlemlerini gerçekleştireceğiz.
	Tipe uyan her bir paket sistemin modüllerini oluşturmaktadır ve kurulum işlemleri composer dışında Tower için gerçekleşmektedir.
	Bu nedenle, kurulan paketler üzerinde bir takım işlemlerin gerçekleşmesi gerekmekte.
	Öncelikle,
	kurulan tüm paketlerin 


	name : lappuse/backend
	namespace : lappuse.backend
	path : vendor/lappuse/backend
	directory : src


	Installer : Paketlerin kurulum işlemlerinden sorumlu,
	Package: Paketlerin bir sınıfının oluşturulduğu arayüz ve soyut sınıflar,
	Repository: Tüm paketleri yöneten ve package sınıfının bir olgusunu döndürebilen yönetici depo sınıfı.



	ServisProvider: paket içerisinde ki sınıfların container a bildirilmesi için bir yoldur. 
	

	Tower bir paket sağlayıcı ile çalışır, tıpkı konteynırın servis sağlayıcı ile çalıştığı gibi. 
	Paket sağlayıcı bir çok başka sistemlerle etkileşime giren verileri sağlayan sistemdir.
	Bunlar, container için sınıflar olduğu gibi, veritabanı, control ve view gibi diğer uzantıları kapsar.
	Bu nedenle genel olarak tower için yazılan paketler de paket sağlayıcı bulunmalıdır. Paketin içerisinde sisteme dahil edilecek tüm 
	sınıfların geri bildirileceği yer olacaktır. Bu nedenle paket sağlayıcı paketin içerisindeki sınıfların yöneticilerinden bağımsız çalışır ve 
	paket sağlayıcıdan gelen bilgileri ilgili sınıf yöneticilerine iletmekle sorumludur. 
	Dediğim gibi paket sağlayıcıdan gelen bir konteynır nesnesini register esnasında ilgili yönetici sınıfına yani Container sınıfına geçmekle sorumludur.


	==PROJE OLUŞTURMA VE ÇALIŞMA ORTAMI==
		- Lappuse.io üzerinden bir account açılır. 
		- Proje ekle sekmesinden bir proje oluşturulur.
		- Oluşturulan projeye ait api secret keyler temin edilir.
		- Projede kullanılacak ana bir uygulama seçilir.
		- Uygulama seçildikten sonra uygulama ile gelen bağımlı modüller listelenir. 
		- Kurulum gerçekleştirmek için, kurulum yönergeleri adımları izlenir. 
		- Kurulum esnasında projeye ait api secret keyler girilir ve default ayarların yapılması istenir.
		- Daha sonra ki adımda, uygulama üzerinde kullanılacak paketlerin (theme, plugin vb.) seçimleri yapılır.
		- paket seçimleri sonrası bağımlı olunan tüm paketler listelenir, sisteme kurulur ve geliştirme ortamı tamamlanmış olunur. 
