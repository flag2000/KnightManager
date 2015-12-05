<?php
/**
 * @author	Philipp Bornemann
 * @copyright	2015-2017 Philipp Bornemann
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 */
class Template {
	private $template_dir = 'template/';

    private $left_delimiter = '{$';

    private $right_delimiter = '}';

    private $left_delimiter_f = '{';

    private $right_delimiter_f = '}';

    private $left_delimiter_c = '\{\*';

    private $right_delimiter_c = '\*\}';

    private $tpl_file = '';

    private $tpl_name = '';

    private $tpl = '';

	public function __construct($tpl_dir = '') {
        if (!empty($tpl_dir)) {
            $this->template_dir = $tpl_dir;
        }
    }

	public function load($file)    {
        $this->tpl_name = $file;
        $this->tpl_file = $this->template_dir.$file;

        if(!empty($this->tpl_file)) {
            if(file_exists($this->tpl_file)) {
                $this->tpl = file_get_contents($this->tpl_file);
            }
			else {
                return false;
            }
        }
		else {
           return false;
        }

        $this->parse_functions();
	}

	public function assign($replace, $replacement) {
        $this->tpl = str_replace($this->left_delimiter.$replace.$this->right_delimiter, $replacement, $this->tpl);
    }

	private function parse_functions() {
        while(preg_match('/' .$this->left_delimiter_d.include file=\"(.*)\.(.*)\"".$this->right_delimiter_f."/isUe", $this->tpl)) {
			$this->tpl = preg_replace("/".$this->left_delimiter_f."include file=\"(.*)\.(.*)\"".$this->right_delimiter_f."/isUe","file_get_contents(\$this->templateDir.'\\1'.'.'.'\\2')", $this->tpl);
        }

        $this->tpl = preg_replace("/".$this->left_delimiter_c."(.*)".$this->right_delimiter_c."/isUe","", $this->tpl);
    }

	public function display() {
        echo $this->tpl;
    }
}
?>