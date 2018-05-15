<?php
class Users_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function insert_entry()
    {
        $this->title    = $_POST['title']; // please read the below note
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

    /**
     * Get all purchase info about each product registered on the system
     * such as Buyer, purchase datetime and etc.
     */
    public function getDatatablesList($limit = null, $offset = 0)
    {
        // Col names by alias, used to order by colName, not alias, because
        // doesn't work when this is a datetime column
        $orderable = [
            'fullname' => 'name',
        ];

        $query = $this->db
            ->select('SQL_CALC_FOUND_ROWS id, id, name as fullname, DATE_FORMAT(created_at, \'%d/%m/%Y %H:%i\') as treated_datetime', false)
            ->from('users')
        ;

        //Ao filtrar por "todos" no datatables, ele envia -1
        if ( $limit > 0 ) {
            $query
                ->limit($limit)
                ->offset($offset);
        }

        $this->datatablesQuery($query, [], $orderable);

        $result = $query->get()->result();
        $foundRows = $this->db->select('FOUND_ROWS() as found_rows')->get()->result_array()[0]['found_rows'];

        return ['foundRows' => $foundRows, 'data' => $result];
    }

}