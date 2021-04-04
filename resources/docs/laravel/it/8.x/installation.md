# Installazione

- [Conosciamo Laravel](#meet-laravel)
    - [Perchè Laravel?](#why-laravel)
- [Il tuo primo progetto in Laravel](#your-first-laravel-project)
    - [Guida introduttiva su macOS](#getting-started-on-macos)
    - [Guida introduttiva su Windows](#getting-started-on-windows)
    - [Guida introduttiva su Linux](#getting-started-on-linux)
    - [Scegliere i tuoi Servizi Sail](#choosing-your-sail-services)
    - [Installazione Via Composer](#Installazione-via-composer)
- [Configurazioni Iniziali](#initial-configuration)
    - [Configurazione basata sull'ambiente](#environment-based-configuration)
    - [Configurazione delle Directory](#directory-configuration)
- [Prossimi Passi](#next-steps)
    - [Laravel The Full Stack Framework](#laravel-the-fullstack-framework)
    - [Laravel The API Backend](#laravel-the-api-backend)

<a name="meet-laravel"></a>
## Conosciamo Laravel

Laravel è un framework con una sintassi elegante e significativa. Un web framework che fornisce una struttura di partenza per creare le tue applicazioni, permettendoti di concentrarti sulla creazione di qualcosa di straordinario mentre ci occupiamo dei dettagli.

Laravel si impegna a fornire un'esperienza straordinaria per gli sviluppatori, fornendo al contempo potenti funzionalità come l'inserimento completo delle dipendenze, un livello di astrazione del database espressivo, code e lavori pianificati, test di unità e integrazione e altro ancora.

Che tu sia neofita di PHP o dei framework web o che tu abbia anni di esperienza, Laravel è un framework che può crescere con te. Ti aiuteremo a muovere i primi passi come sviluppatore web o ti daremo una aiuto mentre porti la tua esperienza al livello successivo. Non vediamo l'ora di vedere cosa costruirai.

<a name="why-laravel"></a>
### Perché Laravel?

Quando si crea un'applicazione web, sono disponibili numerosi strumenti e framework. Tuttavia, riteniamo che Laravel sia la scelta migliore per la creazione di applicazioni web moderne e full-stack.

#### Un Framework Progressista

Ci piace chiamare Laravel un framework "progressista". Con questo, intendiamo che Laravel cresce con te. Se stai solo muovendo i primi passi nello sviluppo web, la vasta libreria di documentazione, guide e [tutorial video] di Laravel (https://laracasts.com) ti aiuterà a imparare le basi senza essere sopraffatto.

Se sei uno sviluppatore senior, Laravel ti offre strumenti affidabili per [iniezione delle dipendenze](/docs/{{version}}/container), [unit testing](/docs/{{version}}/testing), [queues](/docs/{{version}}/queues), [real-time events](/docs/{{version}}/broadcasting) e altro ancora. Laravel è ottimizzato per la creazione di applicazioni Web professionali e pronto per gestire carichi di lavoro aziendali.

#### Un Framework Scalabile

Laravel è incredibilmente scalabile. Grazie alla natura adatta al ridimensionamento di PHP e al supporto integrato di Laravel per sistemi di cache distribuiti e veloci come Redis, il ridimensionamento orizzontale con Laravel è un gioco da ragazzi. In effetti, le applicazioni Laravel sono state facilmente ridimensionate per gestire centinaia di milioni di richieste al mese.

Hai bisogno di un ridimensionamento estremo? Piattaforme come [Laravel Vapor](https://vapor.laravel.com) ti consentono di eseguire la tua applicazione Laravel su scala quasi illimitata sulla più recente tecnologia serverless di AWS.

#### Un Framework Comunitario

Laravel combina i migliori pacchetti nell'ecosistema PHP per offrire il framework più robusto e intuitivo per gli sviluppatori disponibile. Inoltre, migliaia di sviluppatori di talento da tutto il mondo hanno [contribuito al framework](https://github.com/laravel/framework). Chissà, forse diventerai anche un collaboratore di Laravel.

<a name="your-first-laravel-project"></a>
## Il tuo primo progetto in Laravel

We want it to be as easy as possible to get started with Laravel. There are a variety of options for developing and running a Laravel project on your own computer. While you may wish to explore these options at a later time, Laravel provides [Sail](/docs/{{version}}/sail), a built-in solution for running your Laravel project using [Docker](https://www.docker.com).

Docker is a tool for running applications and services in small, light-weight "containers" which do not interfere with your local computer's installed software or configuration. This means you don't have to worry about configuring or setting up complicated development tools such as web servers and databases on your personal computer. To get started, you only need to install [Docker Desktop](https://www.docker.com/products/docker-desktop).

Laravel Sail is a light-weight command-line interface for interacting with Laravel's default Docker configuration. Sail provides a great starting point for building a Laravel application using PHP, MySQL, and Redis without requiring prior Docker experience.

> {tip} Already a Docker expert? Don't worry! Everything about Sail can be customized using the `docker-compose.yml` file included with Laravel.

<a name="getting-started-on-macos"></a>
### Getting Started On macOS

If you're developing on a Mac and [Docker Desktop](https://www.docker.com/products/docker-desktop) is already installed, you can use a simple terminal command to create a new Laravel project. For example, to create a new Laravel application in a directory named "example-app", you may run the following command in your terminal:

```nothing
curl -s "https://laravel.build/example-app" | bash
```

Of course, you can change "example-app" in this URL to anything you like. The Laravel application's directory will be created within the directory you execute the command from.

After the project has been created, you can navigate to the application directory and start Laravel Sail. Laravel Sail provides a simple command-line interface for interacting with Laravel's default Docker configuration:

```nothing
cd example-app

./vendor/bin/sail up
```

The first time you run the Sail `up` command, Sail's application containers will be built on your machine. This could take several minutes. **Don't worry, subsequent attempts to start Sail will be much faster.**

Once the application's Docker containers have been started, you can access the application in your web browser at: http://localhost.

> {tip} To continue learning more about Laravel Sail, review its [complete documentation](/docs/{{version}}/sail).

<a name="getting-started-on-windows"></a>
### Getting Started On Windows

Before we create a new Laravel application on your Windows machine, make sure to install [Docker Desktop](https://www.docker.com/products/docker-desktop). Next, you should ensure that Windows Subsystem for Linux 2 (WSL2) is installed and enabled. WSL allows you to run Linux binary executables natively on Windows 10. Information on how to install and enable WSL2 can be found within Microsoft's [developer environment documentation](https://docs.microsoft.com/en-us/windows/wsl/install-win10).

> {tip} After installing and enabling WSL2, you should ensure that Docker Desktop is [configured to use the WSL2 backend](https://docs.docker.com/docker-for-windows/wsl/).

Next, you are ready to create your first Laravel project. Launch [Windows Terminal](https://www.microsoft.com/en-us/p/windows-terminal/9n0dx20hk701?rtc=1&activetab=pivot:overviewtab) and begin a new terminal session for your WSL2 Linux operating system. Next, you can use a simple terminal command to create a new Laravel project. For example, to create a new Laravel application in a directory named "example-app", you may run the following command in your terminal:

```nothing
curl -s https://laravel.build/example-app | bash
```

Of course, you can change "example-app" in this URL to anything you like. The Laravel application's directory will be created within the directory you execute the command from.

After the project has been created, you can navigate to the application directory and start Laravel Sail. Laravel Sail provides a simple command-line interface for interacting with Laravel's default Docker configuration:

```nothing
cd example-app

./vendor/bin/sail up
```

The first time you run the Sail `up` command, Sail's application containers will be built on your machine. This could take several minutes. **Don't worry, subsequent attempts to start Sail will be much faster.**

Once the application's Docker containers have been started, you can access the application in your web browser at: http://localhost.

> {tip} To continue learning more about Laravel Sail, review its [complete documentation](/docs/{{version}}/sail).

#### Developing Within WSL2

Of course, you will need to be able to modify the Laravel application files that were created within your WSL2 Installazione. To accomplish this, we recommend using Microsoft's [Visual Studio Code](https://code.visualstudio.com) editor and their first-party extension for [Remote Development](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.vscode-remote-extensionpack).

Once these tools are installed, you may open any Laravel project by executing the `code .` command from your application's root directory using Windows Terminal.

<a name="getting-started-on-linux"></a>
### Getting Started On Linux

If you're developing on Linux and [Docker](https://www.docker.com) is already installed, you can use a simple terminal command to create a new Laravel project. For example, to create a new Laravel application in a directory named "example-app", you may run the following command in your terminal:

```nothing
curl -s https://laravel.build/example-app | bash
```

Of course, you can change "example-app" in this URL to anything you like. The Laravel application's directory will be created within the directory you execute the command from.

After the project has been created, you can navigate to the application directory and start Laravel Sail. Laravel Sail provides a simple command-line interface for interacting with Laravel's default Docker configuration:

```nothing
cd example-app

./vendor/bin/sail up
```

The first time you run the Sail `up` command, Sail's application containers will be built on your machine. This could take several minutes. **Don't worry, subsequent attempts to start Sail will be much faster.**

Once the application's Docker containers have been started, you can access the application in your web browser at: http://localhost.

> {tip} To continue learning more about Laravel Sail, review its [complete documentation](/docs/{{version}}/sail).

<a name="choosing-your-sail-services"></a>
### Choosing Your Sail Services

When creating a new Laravel application via Sail, you may use the `with` query string variable to choose which services should be configured in your new application's `docker-compose.yml` file. Available services include `mysql`, `pgsql`, `redis`, `memcached`, `meilisearch`, `selenium`, and `mailhog`:

```nothing
curl -s "https://laravel.build/example-app?with=mysql,redis" | bash
```

If you do not specify which services you would like configured, a default stack of `mysql`, `redis`, `meilisearch`, `mailhog`, and `selenium` will be configured.

<a name="Installazione-via-composer"></a>
### Installazione Via Composer

If your computer already has PHP and Composer installed, you may create a new Laravel project by using Composer directly. After the application has been created, you may start Laravel's local development server using the Artisan CLI's `serve` command:

    composer create-project laravel/laravel example-app

    cd example-app

    php artisan serve

<a name="the-laravel-installer"></a>
#### The Laravel Installer

Or, you may install the Laravel Installer as a global Composer dependency:

```nothing
composer global require laravel/installer

laravel new example-app

cd example-app

php artisan serve
```

Make sure to place Composer's system-wide vendor bin directory in your `$PATH` so the `laravel` executable can be located by your system. This directory exists in different locations based on your operating system; however, some common locations include:

<div class="content-list" markdown="1">
- macOS: `$HOME/.composer/vendor/bin`
- Windows: `%USERPROFILE%\AppData\Roaming\Composer\vendor\bin`
- GNU / Linux Distributions: `$HOME/.config/composer/vendor/bin` or `$HOME/.composer/vendor/bin`
</div>

For convenience, the Laravel installer can also create a Git repository for your new project. To indicate that you want a Git repository to be created, pass the `--git` flag when creating a new project:

```bash
laravel new example-app --git
```

This command will initialize a new Git repository for your project and automatically commit the base Laravel skeleton. The `git` flag assumes you have properly installed and configured Git. You can also use the `--branch` flag to set the initial branch name:

```bash
laravel new example-app --git --branch="main"
```

Instead of using the `--git` flag, you may also use the `--github` flag to create a Git repository and also create a corresponding private repository on GitHub:

```bash
laravel new example-app --github
```

The created repository will then be available at `https://github.com/<your-account>/my-app.com`. The `github` flag assumes you have properly installed the [`gh` CLI tool](https://cli.github.com) and are authenticated with GitHub. Additionally, you should have `git` installed and properly configured. If needed, you can pass additional flags that supported by the GitHub CLI:

```bash
laravel new example-app --github="--public"
```

You may use the `--organization` flag to create the repository under a specific GitHub organization:

```bash
laravel new example-app --github="--public" --organization="laravel"
```

<a name="initial-configuration"></a>
## Initial Configuration

All of the configuration files for the Laravel framework are stored in the `config` directory. Each option is documented, so feel free to look through the files and get familiar with the options available to you.

Laravel needs almost no additional configuration out of the box. You are free to get started developing! However, you may wish to review the `config/app.php` file and its documentation. It contains several options such as `timezone` and `locale` that you may wish to change according to your application.

<a name="environment-based-configuration"></a>
### Environment Based Configuration

Since many of Laravel's configuration option values may vary depending on whether your application is running on your local computer or on a production web server, many important configuration values are defined using the `.env` file that exists at the root of your application.

Your `.env` file should not be committed to your application's source control, since each developer / server using your application could require a different environment configuration. Furthermore, this would be a security risk in the event an intruder gains access to your source control repository, since any sensitive credentials would get exposed.

> {tip} For more information about the `.env` file and environment based configuration, check out the full [configuration documentation](/docs/{{version}}/configuration#environment-configuration).

<a name="directory-configuration"></a>
### Directory Configuration

Laravel should always be served out of the root of the "web directory" configured for your web server. You should not attempt to serve a Laravel application out of a subdirectory of the "web directory". Attempting to do so could expose sensitive files that exist within your application.

<a name="next-steps"></a>
## Next Steps

Now that you have created your Laravel project, you may be wondering what to learn next. First, we strongly recommend becoming familiar with how Laravel works by reading the following documentation:

<div class="content-list" markdown="1">
- [Request Lifecycle](/docs/{{version}}/lifecycle)
- [Configuration](/docs/{{version}}/configuration)
- [Directory Structure](/docs/{{version}}/structure)
- [Service Container](/docs/{{version}}/container)
- [Facades](/docs/{{version}}/facades)
</div>

How you want to use Laravel will also dictate the next steps on your journey. There are a variety of ways to use Laravel, and we'll explore two primary use cases for the framework below.

<a name="laravel-the-fullstack-framework"></a>
### Laravel The Full Stack Framework

Laravel may serve as a full stack framework. By "full stack" framework we mean that you are going to use Laravel to route requests to your application and render your frontend via [Blade templates](/docs/{{version}}/blade) or using a single-page application hybrid technology like [Inertia.js](https://inertiajs.com). This is the most common way to use the Laravel framework.

If this is how you plan to use Laravel, you may want to check out our documentation on [routing](/docs/{{version}}/routing), [views](/docs/{{version}}/views), or the [Eloquent ORM](/docs/{{version}}/eloquent). In addition, you might be interested in learning about community packages like [Livewire](https://laravel-livewire.com) and [Inertia.js](https://inertiajs.com). These packages allow you to use Laravel as a full-stack framework while enjoying many of the UI benefits provided by single-page JavaScript applications.

If you are using Laravel as a full stack framework, we also strongly encourage you to learn how to compile your application's CSS and JavaScript using [Laravel Mix](/docs/{{version}}/mix).

> {tip} If you want to get a head start building your application, check out one of our official [application starter kits](/docs/{{version}}/starter-kits).

<a name="laravel-the-api-backend"></a>
### Laravel The API Backend

Laravel may also serve as an API backend to a JavaScript single-page application or mobile application. For example, you might use Laravel as an API backend for your [Next.js](https://nextjs.org) application. In this context, you may use Laravel to provide [authentication](/docs/{{version}}/sanctum) and data storage / retrieval for your application, while also taking advantage of Laravel's powerful services such as queues, emails, notifications, and more.

If this is how you plan to use Laravel, you may want to check out our documentation on [routing](/docs/{{version}}/routing), [Laravel Sanctum](/docs/{{version}}/sanctum), and the [Eloquent ORM](/docs/{{version}}/eloquent).

