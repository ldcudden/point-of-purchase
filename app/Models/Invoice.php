<?php
namespace App\Models;

use DB;


class Invoice extends Model {

    protected static $table = 'invoice';
    protected static $key = 'id';

    public $name;
    
    public function fullName() {
        // $sql = "
        //     SELECT id, CONCAT(first_name, ' ', last_name) AS name 
        //     FROM customer
        //     ";

        //     $results = DB::select($sql);
            
        //     $my_invoices = array();
            
        //         foreach($results as $row) {
                    
        //             // $inv = new Invoice;
        //             //$inv->name = $row['name'];

        //             //$my_invoices[] = $inv;
        //         }
        //         //return $row->name;
    }


    public function getCustomer() {
        return new Customer($this->customer_id);
    }

    /*
    public function getItems() {

        // SQL Statement
        $sql = "
            SELECT *, (price * quantity) AS total
            FROM invoice
            JOIN invoice_item ON (invoice.id = invoice_item.invoice_id)
            JOIN item ON (invoice_item.item_id = item.id)
            WHERE invoice.id = :id
            ";

        // Run Statement
        $results = DB::select($sql, ['id' => $this->id]);

        return $results;

    }
    */
    
    public function delete() {
        DB::delete('delete from invoice where id = :id', [$this->id]);
    }

}
