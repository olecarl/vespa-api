# Vespa API

![Build Status](https://github.com/olecarl/vespa-api/actions/workflows/symfony.yml/badge.svg)

## Features

Classic Vespa model catalogue with a RESTful Web API
- browse all models build from 1964 to 1999
- filter by year, category or feature
- match model by serial number

## Installation

Clone the source code direct from Github repository:
```markdown
git clone https://github.com/olecarl/vespa-api.git
```

## Usage

Start local webserver and your browser with this url:

```markdown
symfony serve

https://127.0.0.1:8000
```

Run the Codeception testsuite:
```markdown
vendor/bin/codecept run
```

## Documentation