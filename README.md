To deploy this app:
 
 step 1: Create a database with the name "zcar" in your DBMS
 
 step 2: Import "zcar.sql" to create tables and DATA
 
 step 3: Go to php/connectdb and configure the PDO object
 
 =======================================================================
NOTE: 
	In that app we use logical DELETE. When you delete an item we just set its column "visible" 
	to 0 (false)
	