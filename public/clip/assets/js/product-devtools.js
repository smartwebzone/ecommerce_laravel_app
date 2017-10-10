var ProductDevTools = function () {


    var runTools = function () {


        function ups_services_row_indexes() {
            jQuery('tbody tr').each(function (index, el) {
                jQuery('input.order', el).val(parseInt(jQuery(el).index('tr')));
            });
        }

        for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].on('change', function () {
                CKEDITOR.instances[i].updateElement()
            });
        }


        $('select#status.form-control').val('Online');
        $('select#availability.form-control').val('OnHold').change();
        $('select#office_status.form-control').val('Live').change();

        var number = Math.floor(Math.random() * 1E2);
        var price = Math.floor(Math.random() * 2E3);
        var quantity = Math.floor(Math.random() * 1E3);
        var model = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5);
        var sku = Math.floor(Math.random() * 1E6);
        var upc = Math.random().toString().slice(-6);
        var name = "Product Name " + number;
        var keywords = "Aenean, commodo, ligula, eget, dolor, Aenean massa";
        var details = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.";
        var descrip = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. " +
            "Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, " +
            "pretium quis, sem. Nulla consequat massa quis enim.";


        document.getElementById("name").value = name;
        document.getElementById("subtitle").value = "subtitle goes here";
        document.getElementById("details").value = details;
        document.getElementById("description").value = descrip;

        // document.getElementById("facebook_title").value = name + " on FaceBook";
        // document.getElementById("google_plus_title").value = name + " on Google Plus";
        // document.getElementById("twitter_title").value = name + " @QuiltWithGrace";

        $('input#facebook_title').val(name + ' on FaceBook.');
        $('input#google_plus_title').val(name + ' on GooglePlus.');
        $('input#twitter_title').val(name + ' @QuiltWithGrace');


    };

    var runFakePricing = function () {

        var number = Math.floor(Math.random() * 1E2);
        var price = Math.floor(Math.random() * 2E3);
        var quantity = Math.floor(Math.random() * 1E3);
        var model = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5);
        var sku = Math.floor(Math.random() * 1E6);
        var upc = Math.random().toString().slice(-6);


        $('input#quantity').val(quantity);
        $('input#model').val(number + "-" + model);
        $('input#price').val(price);
        $('input#sku').val(sku);
        $('input#upc').val("636343" + upc);

        if (window.console && window.console.log) {
            console.log("%c Insert Data For New Product Price ", 'text-transform: uppercase;font-weight: bold;');
            console.log("%c                                                                ", 'border-top: solid 2px purple; text-transform: uppercase;font-weight: bold;');
            console.log("%c MODEL: " + "%c  " + model, 'background: purple;color:white;text-transform: uppercase;font-weight: bold;', 'text-transform: uppercase;font-weight: bold;');
            console.log("%c PRICE: " + "%c  " + price, 'background: purple;color:white;text-transform: uppercase;font-weight: bold;', 'text-transform: uppercase;font-weight: bold;');
            console.log("%c QTY: " + "%c  " + quantity, 'background: purple;color:white;text-transform: uppercase;font-weight: bold;', 'text-transform: uppercase;font-weight: bold;');
            console.log("%c UPC: " + "%c  " + "636343" + upc, 'background: purple;color:white;text-transform: uppercase;font-weight: bold;', 'text-transform: uppercase;font-weight: bold;');
            console.log("%c SKU: " + "%c  " + sku, 'background: purple;color:white;text-transform: uppercase;font-weight: bold;', 'text-transform: uppercase;font-weight: bold;');
            console.log("%c                                                                ", 'border-top: solid 2px purple; text-transform: uppercase;font-weight: bold;');
        }
    };

    var runFakeMeta = function () {


        $('select#status.form-control').val('Online');
        $('select#availability.form-control').val('OnHold').change();
        $('select#office_status.form-control').val('Live').change();

        var number = Math.floor(Math.random() * 1E2);
        var price = Math.floor(Math.random() * 2E3);
        var quantity = Math.floor(Math.random() * 1E3);
        var model = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5);
        var sku = Math.floor(Math.random() * 1E6);
        var upc = Math.random().toString().slice(-6);
        var name = "Product Name " + number;
        var keywords = "Aenean, commodo, ligula, eget, dolor, Aenean massa";
        var details = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.";
        var descrip = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. " +
            "Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, " +
            "pretium quis, sem. Nulla consequat massa quis enim.";


        document.getElementById("name").value = name;
        document.getElementById("subtitle").value = "subtitle goes here";
        document.getElementById("details").value = details;
        document.getElementById("description").value = descrip;

        // document.getElementById("facebook_title").value = name + " on FaceBook";
        // document.getElementById("google_plus_title").value = name + " on Google Plus";
        // document.getElementById("twitter_title").value = name + " @QuiltWithGrace";

        $('input#facebook_title').val(name + ' on FaceBook.');
        $('input#google_plus_title').val(name + ' on GooglePlus.');
        $('input#twitter_title').val(name + ' @QuiltWithGrace');


        // document.getElementById("meta_title").value = name;
        $('input#meta_title').val(name);
        $('input#meta_keywords_tag').val(keywords);
        $('textarea#meta_description').val(descrip);

        if (window.console && window.console.log) {
            console.log("%c INSERTING FAKE DATA FOR META", 'text-transform: uppercase;font-weight: bold;');
            console.log("%c                                                                ", 'border-top: solid 2px red; color: black;text-transform: uppercase;font-weight: bold;');
            console.log("%c TITLE:" + "%c  " + name, 'background: red;color:white;text-transform: uppercase;font-weight: bold;', 'text-transform: uppercase;font-weight: bold;');
            console.log("%c KEYWORDS:" + "%c  " + keywords, 'background: red;color:white;text-transform: uppercase;font-weight: bold;', 'text-transform: uppercase;font-weight: bold;');
            console.log("%c META DESCRIPTION: " + "%c  " + descrip, 'background: red;color:white;text-transform: uppercase;font-weight: bold;', 'text-transform: uppercase;font-weight: bold;');
            console.log("%c FACEBOOK: " + "%c  " + name + ' on FaceBook.', 'background: red;color:white;text-transform: uppercase;font-weight: bold;', 'text-transform: uppercase;font-weight: bold;');
            console.log("%c GOOGLEPLUS: " + "%c  " + name + ' on GooglePlus', 'background: red;color:white;text-transform: uppercase;font-weight: bold;', 'text-transform: uppercase;font-weight: bold;');
            console.log("%c TWEETER: " + "%c  " + name + ' @QuiltWithGrace', 'background: red;color:white;text-transform: uppercase;font-weight: bold;', 'text-transform: uppercase;font-weight: bold;');
            //console.log("%c GOOGLEPLUS: " + sku,  'text-transform: uppercase;font-weight: bold;');
            console.log("%c                                                                ", 'border-bottom: solid 2px red; color: black;text-transform: uppercase;font-weight: bold;');
        }
    };


    var runFakeFeatures = function () {

    };


    var ShowInConsole = function () {

        if (window.console && window.console.log) {

            console.log("%c =======================================================");
            console.log("%c                                                                                               ");
            console.log("%c =======================================================");
            console.log("%c ADMIN BACKEND FILES", 'border: solid 2px red; color: #black;text-transform: uppercase;font-weight: bold;', '= REQUIRED FILES LIST');
            console.log("%c =======================================================");
            console.log("%c                                                                                               ");
            console.log("%c BACKEND/*", 'background: #FFF; color: blue;text-transform: uppercase;font-weight: bold;', "@DIR");
            console.log("%c     └── ECOM/*", 'background: #FFF; color: blue;text-transform: uppercase;font-weight: bold;', "@DIR");
            console.log("%c         └── PRODUCTS/*", 'background: #FFF; color: blue;text-transform: uppercase;font-weight: bold;', "@DIR");
            console.log("%c                 ├── CREATE-SECTIONS/*", 'background: #FFF; color: darkgreen', "@DIR");
            console.log("%c                 │       ├── ADDITIONAL-FIELDS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       ├── BASIC-FIELDS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       ├── DEVELOPER-FIELDS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       ├── DOCS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       ├── HELP.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       ├── IMAGE-FIELDS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       ├── META-FIELDS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       ├── OVERVIEW-FIELDS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       ├── PRICING-FIELDS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       ├── REVIEWS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       └── WARRANTY.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            //    console.log("%c                 │                                                                                       ");
            console.log("%c                 ├── DEVTOOLS/*", 'background: #FFF; color: blue;text-transform: uppercase;font-weight: bold;', "@DIR");
            console.log("%c                 │       ├── CONSOLE-OVERVIEW.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       └── DEVTOOLS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            //     console.log("%c                 │                                                                                       ");
            console.log("%c                 ├── PARTIALS/*", 'background: #FFF; color: blue;text-transform: uppercase;font-weight: bold;', "@DIR");
            console.log("%c                 │       ├── ALERTS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       ├── LAYOUT-OPTIONS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       ├── PRODUCTFEATURES.blade.php", 'background: #FFF; color: darkgreen', "@blade", "@table: product_features");
            console.log("%c                 │       ├── PRODUCTOPTIONS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 │       └── PRODUCTVARIANTS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            //  console.log("%c                 │                                                                                       ");
            console.log("%c                 ├── PRODUCTS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 ├── CREATEPRODUCT.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c                 └── EDITPRODUCT.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c =======================================================");
            console.log("%c → LEFT SIDEBAR PRODUCT", 'border: solid 2px red; color: #black;text-transform: uppercase;font-weight: bold;', 'required files list');
            console.log("%c =======================================================");
            //     console.log("%c                                                                                               ");
            console.log("%c LIVE SITE FRONTEND FILES", 'border: solid 2px red; color: #black;text-transform: uppercase;font-weight: bold;', 'required files list');
            console.log("%c SHOP/*", 'background: #FFF; color: blue;text-transform: uppercase;font-weight: bold;', "@DIR");
            console.log("%c     ├── PRODUCT-LSB.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c     └── PARTIALS/*", 'background: #FFF; color: blue;text-transform: uppercase;font-weight: bold;', "@DIR");
            console.log("%c         ├── SIDEBAR.blade.php", 'background:#FFF; color: darkgreen', "@blade");
            console.log("%c         ├── IMAGE-SECTION.blade.php", 'background:#FFF; color: darkgreen', "@blade");
            console.log("%c         ├── PRODUCT-BRANDING.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c         ├── PRODUCT-DETAILS.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            console.log("%c         └── PRODUCT-TAB.blade.php", 'background: #FFF; color: darkgreen', "@blade");
            //      console.log("%c                                                                                              ");
            console.log(" =======================================================");
        }
    };


    return {
        init: function () {
            runTools();
            runFakeMeta();
            //  runFakeFeatures();
            runFakePricing();

        },
        FakeMeta: function () {
            runFakeMeta();
        },
        FakeFeature: function () {
            //  runFakeFeatures();
        },
        FakePricing: function () {
            runFakePricing();
        },
        ShowLayoutIndoInConsole: function () {
            ShowInConsole();
        }
    };
}();
