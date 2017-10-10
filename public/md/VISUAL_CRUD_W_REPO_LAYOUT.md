

# CRUD WITH REPO!
 
### BASIC CRUD WITH REPOSITORY VISUAL LAYOUT REFERENCE
```
├── app/*
│       ├── Http/*
│       │     ├── Controllers/*
│       │     │      ├── API/*
│       │     │      │     └── {cru}APIController.php
│       │     │      └── {crud}Controller.php 
│       │     ├── Requests/*
│       │     │      ├── API/*
│       │     │      │     ├── Create{crud}APIRequest.php 
│       │     │      │     └── Update{crud}APIRequest.php 
│       │     │      ├── Create{crud}Request.php 
│       │     │      └── Update{crud}Request.php 
│       │     │
│       │     ├── api_routes.php
│       │     └── routes.php
│       │
│       ├── Models/*
│       │     └── {crud}.php
│       │       
│       ├── Repositories/*
│       │     └── {crud}Repository.php
├── database/*
│       └── Migrations/*
│                   └── {date}create_{crud}s_table.php
│
└── resources/*
        └── views/*
              └── backend
                     └── {crud}
                            ├── index.blade.php
                            ├── create.blade.php
                            ├── edit.blade.php
                            ├── show.blade.php
                            ├── table.blade.php
                            └── fiels.blade.php

```