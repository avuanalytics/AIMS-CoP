 for ext in Babel cldr CleanChanges LocalisationUpdate Translate UniversalLanguageSelector
 do
   if [ ! -d "$ext" ]
   then
     git clone https://gerrit.wikimedia.org/r/p/mediawiki/extensions/$ext.git
   fi
   cd $ext; git fetch --tags; git checkout 2016.10; cd ..
 done

