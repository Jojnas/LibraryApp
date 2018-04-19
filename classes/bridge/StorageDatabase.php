<?php

namespace classes\bridge;

// BRIDGE : oddeluje rozhranie triedy od jej vlastnej implementacie a umoznuje riesit nezavisle zmeny

use interfaces\Publication;

class StorageDatabase {
    protected $db;

    public function __construct($fileName)
    {
        $this->db = new \SQLiteDatabase($fileName, 0666);
        $this->initialiseDatabase();
    }

    public function insertPublication($id, Publication $publication)
    {
        $query = sprintf(
            "INSERT INTO publications VALUES ('%s', '%s', '%s', '%d')",
            get_class($publication), $id, $publication->getCategory(), $publication->getPageCount()
        );

        $this->db->queryExec($query);
    }

    public function fetchPublications()
    {
        $publications = [];
        $query = "SELECT * FROM publications ORDER BY id ASC";

        $result = $this->db->query($query, SQLITE_ASSOC);

        while ($publication = $result->fetch()) {
            $class = $publication['classname'];
            $publications[$publication['id']] = new $class(
                $publication['category'], $publication['pagecount']
            );
        }

        return $publications;
    }

    protected function initialiseDatabase()
    {
        $query = 'SELECT name FROM sqlite_master WHERE type = \'table\' AND name = \'publications\';';
        $result = $this->db->query($query, SQLITE_ASSOC);
        $rows = $result->fetchAll();

        if (!count($rows)) {
            $query = 'CREATE TABLE publications (classname VARCHAR(32), id VARCHAR(32), category VARCHAR(32, pagecount INT))';
            $this->db->queryExec($query);
        }
    }
}