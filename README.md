# Pacific Bath Kohler Portal

Copy the `.env.example` to `.env`. Run the following commands:

`lando start`

`lando composer install`

`lando artisan migrate:fresh --seed`

`lando yarn`

`lando yarn watch`

Google Authentication will currently only work when accessing via `http://localhost:3000/`

Admin users for Bright Oak devs are already created in the seed. The default password is `secret`

To Create a new sales rep user:
`php artisan tinker`
`factory(App\User::class)->state('admin')->create(['email' => 'validemail@gmail.com'])`

To log in as any given user, your `app.env` must be set to `local`. Then visit:
`http://pacificbath.test/devlogin/{user}` where `{user}` is the id of the user you wish to log in as.

To get the data for admin charts, make a GET request to:
`axios.get('/api/admin/dashboard/charts')` - must be logged in as an admin user

To update the sales disposition, make a PUT request to:
`/api/sales-disposition/{lead}/{newSalesDispositionId}`
Example to update Lead ID 42 to a sales disposition ID of 1: `axios.put('/api/sales-disposition/42/1')`



project-data `http://localhost:3001/sample-projects-data`
charts-data `http://localhost:3001/data/sales/dashboard/charts` user should have lead
`https://localhost:3001/devlogin/1` admin
`https://localhost:3001/sales-representative/4`
`https://localhost:3001/devlogin/4` sales

add a property to the component something like admin=true
then make the url the axios request is sent to dependent upon that property
url = '/data/sales/dashboard/charts'
but if admin = true, url = 'data/admin/dashboard/charts'

so if you need anything for local dev, put it in devroutes.php


## Salesforce Setup
* Top right corner, click admin, then setup
* in the quick find box on the left, search for workflow rules
* click edit next to "Send to Bright Oak"
* Evaluation criteria: "record is created"
* Rule criteria: "criteria are met" and "appointment date not equal to" leave value field empty (is not null)
* Click save
* Workflow actions, click Edit
* Make sure URL is set to the current production URL for `route('api.lead')` - check for signed middleware
* Make sure the following fields are selected:
```
id
i360__Address__c
i360__City__c
i360__Components__c
i360__Email_Address__c
i360__External_System_Id_c
i360__Prospect_Email__c
i360__Prospect_Name__c
i360__Sales_Rep_1__c
i360__StartDateTime__c
i360__State__c
i360__Zip__c
```
* Click Save
* Click Done in top right
* Make Active is checked

## SweetAlert 2

How to use inside a vue component:

```vue
Vue.swal({
    title: 'Are you sure?',
    text: 'Selecting another sub category will result in all selections being reset.',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, clear selections',
    reverseButtons: true,
}).then((result) => {
    if (result.value) {
        // Button was accepted, do your thing
    }
});
```

And inside the vue CSS:
```scss
.swal2-popup {
    font-size: 1.6rem !important;
}

.swal2-confirm, .swal2-cancel {
    font-size: 1.8rem !important;
    padding: 8px 10px !important;
    margin: 4px 8px !important;
}
```

## Browser Sync
To enable BrowserSync within webpack add a `MIX_BROWSERSYNC_ENABLED=1` to your .env file.

### HelloSign Integration
By default our factories will generate non-valid hellosign template IDs. You may set `HELLOSIGN_TEMPLATE_ID=44e7283777b0f40d2988c223c1a516428e1ba739` to force all seed data to use a real test template.

You can also import all templates from an account with `artisan api:hellosign:templates:fetch`.
