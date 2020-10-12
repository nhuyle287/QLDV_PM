<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PurposesTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(PurcharOderTableSeeder::class);
        $this->call(PurcharOderItemTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(DomainTableSeeder::class);
        $this->call(TypeDomainTableSeeder::class);
        $this->call(HostingTableSeeder::class);
        $this->call(VpsTableSeeder::class);
        $this->call(EmailTableSeeder::class);
        $this->call(SslTableSeeder::class);
        $this->call(WebsiteTableSeeder::class);
        $this->call(AcademicLevelTableSeeder::class);
        $this->call(CategoryTopicTableSeeder::class);
        $this->call(InternshipTableSeeder::class);
        $this->call(TopicTableSeeder::class);
        $this->call(XDetailAcademicInternshipTableSeeder::class);

        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(UsersTableSeeder::class);

    }
}
