<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/godgodwinter/README-TEMPLATE-laravel">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">SI Administrasi Surat</h3>

  <p align="center">
   SI Administrasi Surat
    <br />
    <a href="https://github.com/godgodwinter/t-surat"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://treatment.baemon.web.id/">View Demo</a>
    ·
    <a href="https://twitter.com/kakadlz">Report Bug</a>
    ·
    <a href="https://twitter.com/kakadlz">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot-ss1]](https://github.com/godgodwinter/t-surat)
[![Product Name Screen Shot][product-screenshot-ss2]](https://github.com/godgodwinter/t-surat)
[![Product Name Screen Shot][product-screenshot-ss3]](https://github.com/godgodwinter/t-surat)
[![Product Name Screen Shot][product-screenshot-ss4]](https://github.com/godgodwinter/t-surat)
<!-- [![Product Name Screen Shot][product-screenshot-ss5]](https://github.com/godgodwinter/t-surat) -->

Sistem Administrasi Surat

### Built With

This section should list any major frameworks that you built your project using. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.
<!-- * [Bootstrap](https://getbootstrap.com) -->
<!-- * [JQuery](https://jquery.com) -->
Tools and Framework
* [Laravel 8](https://laravel.com)
* [PHP 7.4+](https://php.net)
* [gitbash](https://git-scm.com/downloads)
* [composer](https://getcomposer.org/)


<!-- Alternatif (tidak perlu diinstall) -->
<!-- * [docker](https://www.docker.com/) -->
<!-- * [Nodejs](https://node.js) -->

Library/Plugin
* [Auth:Fortify](#)
* [Auth:Jetstream](#)
* [Bootstrap 4](https://getbootstrap.com/docs/4.0/getting-started/introduction/)
* [Stisla](https://github.com/stisla/stisla)


<!-- Fitur Utama
* [Menejemen Data Produk dan Treatment](#)
* [Menejemen Dokter](#)
* [Menejemen Member dan Penjadwalan Perawatan](#)
* [Pengingat SMS gateway](#) -->


<!-- Docker
* [mysql dan settings database](#)
* [phpmyadmin](#) -->


<!-- GETTING STARTED -->
## Getting Started

Siapkan terlebih dahulu peralatan perangnya.

<!-- ### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* npm
  ```sh
  npm install npm@latest -g
  ``` -->

### Installation

<!-- 1. Get a free API Key at [https://example.com](https://example.com) -->
1. Clone the repo
   ```sh
   git clone https://github.com/godgodwinter/t-surat.git
   ```
2. Install menggunakan composer
   ```sh
   composer install
   ```
3. Buat file .env atau copy dan edit file .env_copy kemudian sesuaikan dengan database anda
   ```sh
   cp .env_example .env 
   ```
   Gunakan editor kesukaan anda. Jika mengedit menggunakan nano lakukan langkah berikut:

   ```sh
   nano .env //ubah database user dan password database di perangkat anda
   ```

4. jalankan server Laravel
   ```sh
   php artisan serve
   ```
5. lakukan migrasi database
   ```sh
   php artisan migrate
   ```
   atau migrate:fresh jika ingin dari data kosong
   ```sh
   php artisan migrate:fresh
   ```
6. Jika ingin menggunakan data palsu untuk testing lanjutkan langkah 6 ini
   ```sh
   php artisan db:seed --class=oneseeder  //untuk meload data user admin pass admin
   ```
   

   

Buka browser dan tulis alamat berikut
   
   ```sh
   http://127.0.0.1:8000/
   ```




<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Kukuh Setya Nugraha - [@kakadlz](https://twitter.com/kakadlz) 
Kukuh Setya Nugraha - [@kukuh.sn](https://www.instagram.com/kukuh.sn/) 

Project Link: [https://github.com/godgodwinter/t-surat](https://github.com/godgodwinter/t-surat)






<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/godgodwinter/t-surat.svg?style=for-the-badge
[contributors-url]: https://github.com/godgodwinter/t-surat/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/godgodwinter/t-surat.svg?style=for-the-badge
[forks-url]: https://github.com/godgodwinter/t-surat/network/members
[stars-shield]: https://img.shields.io/github/stars/godgodwinter/t-surat.svg?style=for-the-badge
[stars-url]: https://github.com/godgodwinter/t-surat/stargazers
[issues-shield]: https://img.shields.io/github/issues/godgodwinter/t-surat.svg?style=for-the-badge
[issues-url]: https://github.com/godgodwinter/t-surat/issues
[license-shield]: https://img.shields.io/github/license/godgodwinter/t-surat.svg?style=for-the-badge
[license-url]: https://github.com/godgodwinter/t-surat/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.instagram.com/kukuh.sn/
[product-screenshot-ss1]: images/ss1.png
[product-screenshot-ss2]: images/ss2.png
[product-screenshot-ss3]: images/ss3.png
[product-screenshot-ss4]: images/ss4.png
[product-screenshot-ss5]: images/ss5.png
