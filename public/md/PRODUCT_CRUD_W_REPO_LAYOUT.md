

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

├── app/*

```
> LIST OF ASSET PATHS

* LARGE IMAGE PATH: uploads/products/
* LOOP IMAGE PATH: uploads/products/loop/
* THUMB IMAGE PATH: uploads/products/thumb/
* SHOP IMAGE PATH: uploads/products/shop/



> LIST OF FIELDS USED


status
office_status
availability
slug
ispromo
isDev
hasWarranty
is_published
name
subtitle
manufacturer
details
description
alertstyle
alerttype
alerticon
product_alert_title
product_alert
price_heading
features_heading
additional_heading
reviews_heading
waranty_heading
support_heading
docs_heading
price
model
sku
upc
quantity
thumbnail
photo_album
pubished_at
video_url
meta_title
meta_description
meta_keywords
facebook_title
google_plus_title
twitter_title
filter_class
datalayer
tracking
reviews_tab
warranty_tab
docs_tab
support_tab
lang
weight
length
width
height
view_count
image_path
loop_path
thumb_path
shop_loop_path
created_at
updated_at
deleted_at
