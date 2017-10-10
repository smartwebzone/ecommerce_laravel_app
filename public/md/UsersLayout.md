users
├── app/
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
│       │     ├── UserInfo.php
│       │     └── user.php
│       │
│       ├── Repositories/*
│       │     └── UserRepository.php
├── database/*
│       └── Migrations/*
│                   └── {date}create_user_info_table.php
│
└── resources/*
        └── views/*
              ├── backend
              │     └── users
              │            ├── index.blade.php
              │            ├── create.blade.php
              │            ├── edit.blade.php
              │            ├── show.blade.php
              │            ├── table.blade.php
              │            └── fiels.blade.php
              │
              │
              └── frontend
                    ├── account
                    │      ├── user-profile.blade.php
                    │      ├── user_account.blade.php
                    │      ├── user_dashbord.blade.php
                    │      ├──
                    │      ├──
                    │      └──
                    └──  auth
                            ├── forgot-password.blade.php
                            ├── reset-password.blade.php
                            └── signin.blade.php

