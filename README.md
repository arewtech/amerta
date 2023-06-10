# Amerta

[Amerta](https://jfestudio.github.io/loka/) adalah aplikasi pendaftaran Bootcamp online berbasis website, dengan design website yang mengkece masbroo 😎.

PS: website Amerta ini akan selalu di update kedepannya.

![amerta](/public/design/preview-hero.png)

## Features

-   Authentication ( Fortify ) ✅
-   Update profile ✅
-   Forgot Password ✅
-   Email verification ( use Mailtrap ) ✅

## Features & Design ( Coming soon )

-   Charts
-   Redesign Carousel
-   Redesign Halaman Checkout Camps
-   Redesign Halaman Login & Register
-   Update Schema Database ( Camps, Checkouts )
-   dll

## Dashboard ( Admin )

Preview Dashboard

![amerta](/public/design/dashboard.png)

Preview Camps

![amerta](/public/design/camp.png)

Preview Checkouts

![amerta](/public/design/checkout.png)

## Landing Page ( Users )

Preview Sections

![amerta](/public/design/preview-section.png)

Preview Camps

![amerta](/public/design/preview-camp.png)

Preview Histories

![amerta](/public/design/history.png)

### satset

```bash
git clone https://github.com/JfeStudio/amerta.git 'project'
cd project
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm i && npm run dev
php artisan serve
```

## Authors

Amerta is created by [Maman](https://github.com/JfeStudio).
