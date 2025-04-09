<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

---

## 💼 Projecte TDD - Compte Bancari (Laravel)

Aquest projecte forma part de l'activitat de TDD (Test Driven Development) aplicada a una simulació de gestió de **comptes bancaris** amb Laravel. El projecte ha estat desenvolupat implementant proves unitàries des del principi, seguint una metodologia basada en TDD.

---

## 🔧 Enunciat de l'activitat

- **Crea un Repositori a GitHub**: Inicialitzeu un nou repositori a GitHub per al projecte de la Cuenta que vam desenvolupar anteriorment utilitzant TDD. Assegureu-vos que el repositori sigui públic per a que tots puguem veure i compartir els nostres progressos.
- **Puja el Projecte a GitHub**: Una vegada creat el repositori, puja el codi font del projecte. Això inclou tots els fitxers necessaris per a que el projecte es pugui executar, així com els jocs de proves unitàries que vam escriure seguint la metodologia TDD.
- **Configura GitHub Actions**: L'objectiu aquí és automatitzar l'execució dels tests cada vegada que feu un push al repositori. Per a això, s'ha configurat un *GitHub Action* amb suport per Laravel i PHP 8.2.
- **Executa el Workflow**: Una vegada configurat el GitHub Action, cada `push` executa automàticament els tests unitaris escrits.
- **Modifica el Workflow per Laravel**: El workflow està adaptat a Laravel 11 i fa ús de SQLite per simplificar les proves.

---

## ✅ Tecnologies utilitzades

- PHP 8.2
- Laravel 11
- PHPUnit
- GitHub Actions (CI)

---

## 🧪 Tests

Per executar els tests localment:

```bash
php artisan test