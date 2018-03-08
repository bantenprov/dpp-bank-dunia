# dpp-bank-dunia
Distribusi Pembagian Pengeluaran per Kapita Versi Bank Dunia dan Indeks Gini

### Install via composer

- Development snapshot

```bash
$ composer require bantenprov/dpp-bank-dunia:dev-master
```

- Latest release:

### Download via github

```bash
$ git clone https://github.com/bantenprov/dpp-bank-dunia.git
```

#### Edit `config/app.php` :

```php
'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\DPPBankDunia\DPPBankDuniaServiceProvider::class,
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=dpp-bank-dunia-seeds

```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovDPPBankDuniaSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=dpp-bank-dunia-assets
$ php artisan vendor:publish --tag=dpp-bank-dunia-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
        path: '/dashboard/dpp-bank-dunia',
        components: {
            main: resolve => require(['./components/views/bantenprov/dpp-bank-dunia/DashboardDPPBankDunia.vue'], resolve),
            navbar: resolve => require(['./components/Navbar.vue'], resolve),
            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
            title: "DPP Bank Dunia"
        }
      }
        //== ...
    ]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/dpp-bank-dunia',
            components: {
                main: resolve => require(['./components/bantenprov/dpp-bank-dunia/DPPBankDunia.index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "DPP Bank Dunia"
            }
        },
        {
            path: '/admin/dpp-bank-dunia/create',
            components: {
                main: resolve => require(['./components/bantenprov/dpp-bank-dunia/DPPBankDunia.add.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "DPP Bank Dunia"
            }
        },
        {
            path: '/admin/dpp-bank-dunia/:id',
            components: {
                main: resolve => require(['./components/bantenprov/dpp-bank-dunia/DPPBankDunia.show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "DPP Bank Dunia"
            }
        },
        {
            path: '/admin/dpp-bank-dunia/:id/edit',
            components: {
                main: resolve => require(['./components/bantenprov/dpp-bank-dunia/DPPBankDunia.edit.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "DPP Bank Dunia"
            }
        },
        //== ...
    ]
},
```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
          name: 'DPP Bank Dunia',
          link: '/dashboard/dpp-bank-dunia',
          icon: 'fa fa-angle-double-right'
      }
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
            name: 'DPP Bank Dunia',
            link: '/admin/dpp-bank-dunia',
            icon: 'fa fa-angle-double-right'
          }
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript
//== Example Vuetable

import DPPBankDunia from './components/bantenprov/dpp-bank-dunia/DPPBankDunia.chart.vue';
Vue.component('echarts-dpp-bank-dunia', DPPBankDunia);

import DPPBankDuniaKota from './components/bantenprov/dpp-bank-dunia/DPPBankDuniaKota.chart.vue';
Vue.component('echarts-dpp-bank-dunia-kota', DPPBankDuniaKota);

import DPPBankDuniaTahun from './components/bantenprov/dpp-bank-dunia/DPPBankDuniaTahun.chart.vue';
Vue.component('echarts-dpp-bank-dunia-tahun', DPPBankDuniaTahun);

import DPPBankDuniaAdminShow from './components/bantenprov/dpp-bank-dunia/DPPBankDuniaAdmin.show.vue';
Vue.component('admin-view-dpp-bank-dunia-tahun', DPPBankDuniaAdminShow);

//== Echarts DPP Bank Dunia

import DPPBankDuniaBar01 from './components/views/bantenprov/dpp-bank-dunia/DPPBankDuniaBar01.vue';
Vue.component('dpp-bank-dunia-bar-01', DPPBankDuniaBar01);

import DPPBankDuniaBar02 from './components/views/bantenprov/dpp-bank-dunia/DPPBankDuniaBar02.vue';
Vue.component('dpp-bank-dunia-bar-02', DPPBankDuniaBar02);

//== mini bar charts
import DPPBankDuniaBar03 from './components/views/bantenprov/dpp-bank-dunia/DPPBankDuniaBar03.vue';
Vue.component('dpp-bank-dunia-bar-03', DPPBankDuniaBar03);

import DPPBankDuniaPie01 from './components/views/bantenprov/dpp-bank-dunia/DPPBankDuniaPie01.vue';
Vue.component('dpp-bank-dunia-pie-01', DPPBankDuniaPie01);

import DPPBankDuniaPie02 from './components/views/bantenprov/dpp-bank-dunia/DPPBankDuniaPie02.vue';
Vue.component('dpp-bank-dunia-pie-02', DPPBankDuniaPie02);

//== mini pie charts
import DPPBankDuniaPie03 from './components/views/bantenprov/dpp-bank-dunia/DPPBankDuniaPie03.vue';
Vue.component('dpp-bank-dunia-pie-03', DPPBankDuniaPie03);
