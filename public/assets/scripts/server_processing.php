<?php


/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
// DB table to use
// $table = 'signali';

//  $table = <<<EOT
//  (
//     SELECT 
//       a.id, 
//       a.name, 
//       a.father_id, 
//       b.name AS father_name
//     FROM table a
//     LEFT JOIN table b ON a.father_id = b.id
//  ) temp
// EOT;

 $table = <<<SQL
 (
	SELECT 
	s.id,
	s.name,
	s.phone,
	s.opisanie,
	s.signaldate,
	pod.Pod_NameBg DGS, 
	rdg.Pod_NameBg RDG
	FROM signali as s
	INNER JOIN nug.podelenia as pod	ON pod.Pod_Id = s.pod_id
	INNER JOIN nug.podelenia as rdg	ON rdg.Pod_Id = s.glav_pod
) temp
SQL;
// var_dump($table);
// Table's primary key
$primaryKey = 'id';
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'id',         'dt' => 0 ),
	array( 'db' => 'name',       'dt' => 3 ),
	array( 'db' => 'phone',      'dt' => 4 ),
	array( 'db' => 'opisanie',   'dt' => 6 ),
	array( 'db' => 'signaldate',
	       'dt' => 5 ,
		   'formatter' => function( $d, $row ) {
            return date( 'd.m.Y H:i', strtotime($d));
        }
		),
	array( 'db' => 'DGS',        'dt' => 1 ),
	array( 'db' => 'RDG',        'dt' => 2 ),
		
);

// SQL server connection information
$sql_details = array(
	'user' => 'cotaivo',
	'pass' => 'taniami',
	'db'   => 'iag112new',
	'host' => '172.16.4.34'
);
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);