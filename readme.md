### Description

#####Pages/Blocks export.
Go to the Pages or Blocks grid page. Check rows that should be exported. Implement the `Generate Upgrade Script` mass action for exporting data.

#####Configuration export.
Go to the Stores Configuration page. Check sections that should be exported. Push the `Generate Upgrade Script` button for export fields inside section.

All upgrade script will be saved to `app/cms-upgrade-data` folder.

For apply upgrade script please use console command: 
```php
bin/magento W4PLEGO:cms_upgrade
```

For apply a single upgrade script please use console command with version, example:
```php
bin/magento W4PLEGO:cms_upgrade 0.0.1-0.0.2
```
