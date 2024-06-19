## databse seeder and readme.txt are the only files not to be seeded,
## all other files are to be seeded in the following formart

php artisan db:seed --class=GroupSeeder
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=ShareholdersSeeder
php artisan db:seed --class=PaymentMethodSeeder

php artisan db:seed --class=TagSeeder
php artisan db:seed --class=BrandSeeder
php artisan db:seed --class=ProductSeeder

php artisan db:seed --class=SuppliersSeeder
php artisan db:seed --class=CustomerSeeder

php artisan db:seed --class=BuyingPricesSeeder
php artisan db:seed --class=SellingPricesSeeder

php artisan db:seed --class=BudjetSeeder
php artisan db:seed --class=OrderSeeder