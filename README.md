<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Blog & Kategori Yönetim Sistemi

Laravel tabanlı, çoklu kategori destekli blog yönetim sistemi. Admin paneli ve ön yüz arayüzü ile birlikte gelir.

## 🚀 Özellikler

### Admin Panel
- ✅ Blog CRUD işlemleri (Ekleme, Düzenleme, Silme, Listeleme ) ve Listeleme sayfasında durum değişikliği
- ✅ Kategori yönetimi
- ✅ Bloglara çoklu kategori atama (Many-to-Many ilişki)
- ✅ Blog sıralama ve durum yönetimi
- ✅ Arama ve filtreleme özellikleri
- ✅ Form validasyonları

### Ön Yüz
- 📄 Kategori listeleme sayfası
- 📄 Kategoriye göre blog listeleme
- 📄 Blog detay sayfası

## 🛠️ Teknolojiler

- **Backend**: Laravel 11
- **Database**: MySQL
- **Frontend**: Blade Template , Bootstrap/Tabler
- **JavaScript**: jQuery

## 📋 Gereksinimler

- PHP >= 8.1
- Composer
- MySQL >= 5.7


## ⚙️ Kurulum

### 1. Projeyi Klonlayın

### 2. Bağımlılıkları Yükleyin

### 3. Environment Ayarları

`.env.example` dosyasını `.env` olarak kopyalayın:
`.env` dosyasında veritabanı ayarlarınızı yapın:


### 4. Uygulama Anahtarı Oluşturun
```bash
php artisan key:generate
```

### 5. Veritabanını Oluşturun ve Migration'ları Çalıştırın

**Not**: `--seed` parametresi ile otomatik olarak:
- Test verileri oluşturulur
- Admin kullanıcısı eklenir
- Örnek kategoriler ve bloglar yüklenir

### 6. Uygulamayı Başlatın


## 👤 Test Kullanıcısı

Migration'lar çalıştırıldıktan sonra aşağıdaki bilgiler ile giriş yapabilirsiniz:
```
Email: test@gmail.com
Şifre: test123
```


## 📁 Proje Yapısı
```
├── app/
│   ├── Http/Controllers/
│   │   └── Admin/
│   │       ├── BlogsController.php
│   │       └── CategoryController.php
│   └── Models/
│       ├── Blogs.php
│       └── Category.php
├── database/
│   ├── migrations/
│   │   ├── xxxx_create_blogs_table.php
│   │   ├── xxxx_create_categories_table.php
│   │   └── xxxx_create_blog_category_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── Admin/
│       │   ├── blog/
│       │   └── category/
│       └── Front/
└── routes/
    └── web.php
```

## 🗄️ Veritabanı Yapısı

### Tablolar

#### `blogs`
- id
- title
- slug
- content
- sort
- is_active
- timestamps

#### `categories`
- id
- title
- slug
- short_description
- image
- sort
- is_active
- timestamps

#### `blog_category` (Pivot Table)
- id
- blog_id (Foreign Key → blogs.id)
- category_id (Foreign Key → categories.id)
- timestamps


[Sinem Türkoğlu](https://github.com/sinemturkoglu)
