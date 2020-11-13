<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Administrator']);
        $directorOfSales = Role::create(['name' => 'Director of Sales']);
        $salesRep = Role::create(['name' => 'Sales Representative']);
        $directorOfOps = Role::create(['name' => 'Director of Operations']);
        $processor = Role::create(['name' => 'Processor']);
        $installManager = Role::create(['name' => 'Installation Manager']);

        $viewNova = Permission::create(['name' => 'view_nova']);
        $addNewUsers = Permission::create(['name' => 'add_new_users']);
        $viewEverything = Permission::create(['name' => 'view_everything']);
        $editEverything = Permission::create(['name' => 'edit_everything']);
        $editPromotions = Permission::create(['name' => 'edit_promotions']);
        $beAssignedLeads = Permission::create(['name' => 'be_assigned_leads']);
        $viewAllLeads = Permission::create(['name' => 'view_all_leads']);
        $viewOwnLeads = Permission::create(['name' => 'view_own_leads']);
        $editOwnLeads = Permission::create(['name' => 'edit_own_leads']);
        $viewAdminDashboard = Permission::create(['name' => 'view_admin_dashboard']);
        $viewSalesDashboard = Permission::create(['name' => 'view_sales_dashboard']);

        $updateScheduling = Permission::create(['name' => 'update_scheduling_status']);
        $updateInventory = Permission::create(['name' => 'update_inventory_status']);
        $viewNeedsAnalysis = Permission::create(['name' => 'view_needs_analysis']);
        $viewFinancing = Permission::create(['name' => 'view_financing']);
        $viewBuildEstimate = Permission::create(['name' => 'view_build_estimate']);
        $viewPaymentInfo = Permission::create(['name' => 'view_payment_info']);

        $updateProcessorStatus = Permission::create(['name' => 'update_processor_status']);
        $updateInstallationStatus = Permission::create(['name' => 'update_installation_status']);
        $updateDispositionStatus = Permission::create(['name' => 'update_disposition_status']);

        $manageColors = Permission::create(['name' => 'manage_colors']);
        $manageProducts = Permission::create(['name' => 'manage_products']);
        $manageSubCategories = Permission::create(['name' => 'manage_product_sub_categories']);
        $updateAnswers = Permission::create(['name' => 'update_discovery_question_answers']);
        $updateMeasurements = Permission::create(['name' => 'update_measurements']);

        $admin->givePermissionTo($viewEverything, $editEverything, $addNewUsers, $manageColors, $manageProducts, $manageSubCategories, $updateAnswers, $updateMeasurements, $updateInstallationStatus, $updateProcessorStatus, $updateDispositionStatus, $viewAdminDashboard, $viewSalesDashboard, $viewNova);

        $directorOfSales->givePermissionTo($viewEverything, $editPromotions, $viewAdminDashboard, $viewSalesDashboard);

        $salesRep->givePermissionTo($beAssignedLeads, $viewOwnLeads, $editOwnLeads, $viewFinancing, $viewPaymentInfo, $viewNeedsAnalysis, $viewBuildEstimate, $updateAnswers, $updateMeasurements, $updateDispositionStatus);

        $directorOfOps->givePermissionTo($viewEverything, $viewAdminDashboard, $viewSalesDashboard);

        $processor->givePermissionTo($viewAllLeads, $updateScheduling, $viewFinancing, $viewPaymentInfo, $viewNeedsAnalysis, $viewBuildEstimate, $updateProcessorStatus, $viewAdminDashboard, $viewSalesDashboard);

        $installManager->givePermissionTo($updateInventory, $viewNeedsAnalysis, $viewBuildEstimate, $updateInstallationStatus, $viewAdminDashboard, $viewSalesDashboard);
    }
}
