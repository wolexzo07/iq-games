<?php
class WordFinder
{
    protected $_wordList;
    protected $_map;

    public function __construct(array $wordList)
    {
        $this->_wordList = $wordList;
    }

    protected function _initMap()
    {
        if(!is_array($this->_map)) {
            $this->_map = array();
            foreach($this->_wordList as $word) {
                $key = count_chars($word, 3);
                if(!isset($this->_map[$key])) {
                    $this->_map[$key] = array();
                }
                $this->_map[$key][] = $word;
            }
        }
    }

    public function findWords($searchWord)
    {
        $searchWord = count_chars($searchWord, 3);
        $this->_initMap();
        if(isset($this->_map[$searchWord])) {
            return $this->_map[$searchWord];
        }
        return false;
    }    
}

$list   = array('evil', 'live', 'vile', 'cat');
$finder = new WordFinder($list);
var_dump($finder->findWords('evli'));

?>