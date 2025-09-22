@extends('customer.layouts.master')
@section('title', 'Dashboard')

@section('content')

  <style>
     body {
      font-family: Vazir, Tahoma, sans-serif;
    }

    /* سایدبار دسکتاپ */
    #sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 200px;
      background-color: #f9f9f9;
      border-right: 1px solid #ccc;
      padding: 20px 15px;
      overflow-y: auto;
      z-index: 1030;
    }

    /* فاصله محتوا در دسکتاپ */
    #main-content {
      margin-left: 230px;
      padding: 20px;
    }

    /* دکمه همبرگر بالا سمت چپ، فقط موبایل */
    #menuBtn {
      position: fixed;
      top: 15px;
      left: 15px;
      z-index: 1100;
      font-size: 24px;
      background: #0d6efd;
      border: none;
      color: white;
      border-radius: 6px;
      padding: 6px 12px;
      cursor: pointer;
      display: none;
    }

    /* لینک های داخل منو */
    #sidebar a,
    .offcanvas-body a {
      display: block;
      padding: 12px 15px;
      margin-bottom: 12px;
      color: #333;
      font-weight: 600;
      border-radius: 8px;
      text-decoration: none;
      transition: background-color 0.25s ease, color 0.25s ease;
    }

    #sidebar a:hover,
    .offcanvas-body a:hover {
      background-color: #0d6efd;
      color: white;
      text-decoration: none;
    }

    /* لینک فعال */
    #sidebar a.active,
    .offcanvas-body a.active {
      background-color: #0d6efd;
      color: white;
      font-weight: 700;
    }

    /* نمایش دکمه منو و مخفی کردن سایدبار روی موبایل */
    @media (max-width: 767.98px) {
      #sidebar {
        display: none;
      }
      #menuBtn {
        display: block;
      }
      #main-content {
        margin-left: 0;
        padding: 20px 15px;
      }
    }
  </style>
</head>
<div>
  <!-- دکمه همبرگر -->
  <button id="menuBtn" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
    ☰ منو
  </button>

  <!-- سایدبار دسکتاپ -->
  <nav id="sidebar" class="d-none d-md-block" aria-label="منوی اصلی">
    <h4 class="mb-4">منو دسترسی</h4>
    <a href="#document" class="nav-link">Document</a>
    <a href="#contactus" class="nav-link">Contact Us</a>
    <a href="#aboutus" class="nav-link">About Us</a>
  </nav>

  <!-- سایدبار موبایل (offcanvas) -->
  <div class="offcanvas offcanvas-start w-100" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="mobileSidebarLabel">منو دسترسی</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="بستن"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
      <a href="#document" data-bs-dismiss="offcanvas" class="nav-link">Document</a>
      <a href="#contactus" data-bs-dismiss="offcanvas" class="nav-link">Contact Us</a>
      <a href="#aboutus" data-bs-dismiss="offcanvas" class="nav-link">About Us</a>
    </div>
  </div>


  <main id="main-content" class="bg-light me-4 mb-3 rounded">
    <section id="document" tabindex="0" style="padding-top: 80px; margin-top: -80px;">
      <h2>Document</h2>
      <p>اینجا محتوای بخش Document نمایش داده می‌شود. می‌توانید این قسمت را به دلخواه خود پر کنید.</p>
      <p>لورم ایپسوم متن ساختگی است که در طراحی وب و چاپ استفاده می‌شود...</p>
      <p>ادامه محتوا...</p>
    </section>

    <section id="contactus" tabindex="0" style="padding-top: 80px; margin-top: -80px;">
      <h2>Contact Us</h2>
      <p>در این بخش اطلاعات تماس و فرم تماس با ما قرار می‌گیرد.</p>
      <p>لورم ایپسوم متن ساختگی است که در طراحی وب و چاپ استفاده می‌شود...</p>
      <p>ادامه محتوا...</p>
    </section>

    <section id="aboutus" tabindex="0" style="padding-top: 80px; margin-top: -80px;">
      <h2>About Us</h2>
      <p>معرفی شرکت یا تیم و اطلاعات درباره ما اینجا قرار می‌گیرد.</p>
      <p>لورم ایپسوم متن ساختگی است که در طراحی وب و چاپ استفاده می‌شود...</p>
      <p>ادامه محتوا...</p>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // اسکریپت برای فعال کردن لینک منو بر اساس اسکرول
    document.addEventListener('DOMContentLoaded', () => {
      const sections = document.querySelectorAll('main section');
      const navLinks = document.querySelectorAll('#sidebar a, .offcanvas-body a');

      function activateLink() {
        let scrollPos = window.scrollY || window.pageYOffset;

        sections.forEach((section) => {
          const top = section.offsetTop - 90;  // 90 برای جبران ارتفاع ثابت و فاصله بالا
          const bottom = top + section.offsetHeight;

          if (scrollPos >= top && scrollPos < bottom) {
            navLinks.forEach(link => {
              link.classList.remove('active');
              if (link.getAttribute('href') === '#' + section.id) {
                link.classList.add('active');
              }
            });
          }
        });
      }

      window.addEventListener('scroll', activateLink);
      activateLink();  // اجرا در بارگذاری صفحه
    });
  </script>

  </div>
@endsection
