
# Recruitis API Project

Welcome to the **Recruitis API Project**! This project is designed as a composer package to be integrated into Symfony projects, providing a robust API client for interacting with the Recruitis platform. Below, you'll find a comprehensive guide on how to set up, use, and extend this package. 

[Official API Documentation](https://docs.recruitis.io/api/#section/API-dokumentace-pro-system-Recruitis.io)

## Table of Contents
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Directory Structure](#directory-structure)
- [Testing](#testing)

## Installation

To install the Recruitis API package, use Composer:

```bash
composer require davidbrend/recruitis-api-project
```

This will add the package to your Symfony project and make it available for use.

## Configuration

After installation, configure the package by setting the necessary environment variables. These typically include API credentials and endpoint URLs. Add the following to your `.env` file:

```
RECRUITIS_API_TOKEN=your_api_token
```

Definition in `services.yaml` file:

```
parameters:
    recruitis-api-token: '%env(RECRUITIS_API_TOKEN)%'

recruitis_api:
    api_token: '%recruitis-api-token%'
```

Last definition add into `bundle.php` file:

```
Davebrend\RecruitisApiProject\RecruitisApiProject::class => ['all' => true]
```

## Usage

Here's a simple example of how to use the Recruitis API client in your Symfony project:

```php

use Davebrend\RecruitisApiProject\Client\Query;
use Davebrend\RecruitisApiProject\Facades\JobFacade;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomepageController extends AbstractController
{
    #[Route('/', 'homepage')]
    public function homepage(JobFacade $jobFacade): Response
    {
        $query = new Query(); // query parameters same as API 
        $jobs = $jobFacade->getJobsByQuery($query);
        return $this->render('default/homepage.html.twig');
    }
}
```

## Directory Structure

The directory structure of the project is as follows:

- **src/**
  - **Base/**: Contains base classes and utilities.
  - **Client/**: Contains the API client class.
  - **Configs/**: Configuration classes for setting up the client.
  - **DI/**: Dependency injection related classes.
  - **Dtos/**: Data transfer objects for handling API data.
  - **Enums/**: Enumerations used across the package.
  - **Facades/**: Facades to simplify interaction with the client.
  - **Factories/**: Factory classes for initialize .env data to package.
  - **Services/**: Service classes for handling business logic.
  - **RecruitisApiProject.php**: Main class for the project.

## Testing

This project uses PHPUnit for testing. To run the tests, use the following command:

```bash
vendor/bin/phpunit
```

or

```bash
composer run run-tests
```

The configuration for PHPUnit is provided in `phpunit.xml`, specifying test directories and coverage settings.
