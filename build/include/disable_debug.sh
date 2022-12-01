#!/bin/bash

sed -i "s/$wgShowExceptionDetails = true;/$wgShowExceptionDetails = false;/g"
sed -i "s/$wgDebugToolbar = true;/$wgDebugToolbar = false;/g"
sed -i "s/$wgShowDebug = true;/$wgShowDebug = false;/g"
sed -i "s/$wgDevelopmentWarnings = true;/$wgDevelopmentWarnings = false;/g"

php /var/www/html/maintenance/update.php --quick

echo "Debugging disabled"

