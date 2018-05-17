<?php
class Groups_model extends CI_Model {

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

    /**
     * Get all purchase info about each product registered on the system
     * such as Buyer, purchase datetime and etc.
     */
    public function getDatatablesList($limit = null, $offset = 0)
    {
        // Col names by alias, used to order by colName, not alias, because
        // doesn't work when this is a datetime column
        $orderable = [
            'id' => 'G.id',
            'name' => 'G.name',
            'treated_datetime' => 'G.created_at'
        ];

        $query = $this->db
            ->select('SQL_CALC_FOUND_ROWS G.id, G.id as id, G.name as name, DATE_FORMAT(G.created_at, \'%d/%m/%Y %H:%i\') as treated_datetime', false)
            ->from('groups AS G')
            ->join('teams AS T', 'G.team_id = T.id', 'inner')
            ->where('T.id = ' . filter_var($this->teamID, FILTER_SANITIZE_NUMBER_INT));
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