# Luminous Archive - Academic Administration System

Luminous Archive is a premium, state-of-the-art administrative dashboard built on the modern Laravel ecosystem. It features a specialized design system focused on clarity, institutional excellence, and seamless user experience.

## 🚀 Tech Stack

- **Backend**: [Laravel 11](https://laravel.com)
- **Frontend**: [Vue 3](https://vuejs.org) (Composition API) with [Inertia.js](https://inertiajs.com)
- **UI Framework**: [PrimeVue 4](https://primevue.org) (Aura Preset)
- **Styling**: [Tailwind CSS 3](https://tailwindcss.com)
- **Icons & Fonts**: Material Symbols, PrimeIcons, Manrope (Headlines), and Inter (Body).

## ✨ Key Features

- **Responsive Institutional Layout**: A sleek navigation system featuring a collapsible multi-state sidebar for desktop and a native-feel drawer for mobile.
- **Bento Grid Dashboard**: High-fidelity data visualization and metric overview using advanced Tailwind layouts.
- **PrimeVue Integration**: Seamlessly integrated PrimeVue components (`DataTable`, `Menu`, `Drawer`, `Avatar`, etc.) styled to match the custom design tokens.
- **Dynamic Theming**: Specialized institutional color palette with forced light-mode consistency for a premium brand feel.
- **Modular Architecture**: Clean separation of concerns with dedicated `Sidebar`, `Topbar`, and `Footer` components.

## 🛠️ Installation & Setup

Follow these steps to get your local environment up and running:

### 1. Prerequisites
Ensure you have the following installed:
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL or your preferred database engine

### 2. Clone the Repository
```bash
git clone https://github.com/khoirulmustofa/Laravel-Inertia-Vue.git
cd Laravel-Inertia-Vue

git add .
git commit -m "Feat: primevue"
git push -u origin main

```

### 3. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install JS dependencies
npm install
```

### 4. Configuration
```bash
# Create .env file
cp .env.example .env

# Generate Application Key
php artisan key:generate
```

### 5. Database Setup
Configure your database credentials in the `.env` file, then run:
```bash
# Run migrations
php artisan migrate
```

### 6. Development
You need to run both the Laravel development server and the Vite dev server:

```bash
# Terminal 1: Laravel Server
php artisan serve

# Terminal 2: Vite Dev Server
npm run dev
```

The application will be accessible at `http://localhost:8000`.

## 📂 Project Structure Highlights

- `resources/js/Layouts/AuthenticatedLayout.vue`: The main layout engine.
- `resources/js/Components/Sidebar.vue`: Collapsible navigation logic.
- `resources/js/Pages/Dashboard.vue`: The Bento Grid institutional overview.
- `tailwind.config.js`: Contains the custom "Luminous Archive" design tokens.

## 📄 License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## note
```
bash -c "source ~/.nvm/nvm.sh && nvm use --delete-prefix default && npm install primeicons"
```


## laravel

```
php artisan make:model -m
```