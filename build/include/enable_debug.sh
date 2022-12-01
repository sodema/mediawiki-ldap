#!/bin/bash

sed -i "s/$wgShowExceptionDetails = false;/$wgShowExceptionDetails = true;/g"
sed -i "s/$wgDebugToolbar = false;/$wgDebugToolbar = true;/g"
sed -i "s/$wgShowDebug = false;/$wgShowDebug =true;/g"
sed -i "s/$wgDevelopmentWarnings = false;/$wgDevelopmentWarnings = true;/g"

php /var/www/html/maintenance/update.php --quick

echo "Debugging enabled"

