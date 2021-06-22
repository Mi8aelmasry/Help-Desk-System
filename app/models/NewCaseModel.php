<?php
require_once 'CaseModel.php';
class NewCaseModel extends CaseModel
{

    protected $case_number;
	protected $case_holder_id;
	protected $type_id;
	protected $subject;
	protected $status;
	protected $priority;
	protected $severity;
	protected $description;
	protected $due_date;
    protected $creation_date;
    protected $parent_case;

    public function __construct()
	{
		parent::__construct();
		$this->case_number = '';
		$this->case_holder_id = '';
		$this->type_id = '';
		$this->subject = '';
		$this->status = '';
		$this->priority = '';
		$this->severity = '';
		$this->description = '';
		$this->due_date = '';
        $this->creation_date= '';
        $this->parent_case= '';
    
	}

    public function getCase_number(){
		return $this->case_number;
	}

	public function setCase_number($case_number){
		$this->case_number = $case_number;
	}

    public function set_creationDate($creation_date){
		$this->creation_date = $creation_date;
	}

    public function get_creationDate($creation_date){
		return $this->creation_date;
	}


    public function getCase_holder_id(){
		return $this->case_holder_id;
	}

	public function setCase_holder_id($case_holder_id){
		$this->case_holder_id = $case_holder_id;
	}

    public function getType_id(){
		return $this->type_id;
	}

	public function setType_id($type_id){
		$this->type_id = $type_id;
	}

    public function getSubject(){
		return $this->subject;
	}

	public function setSubject($subject){
		$this->subject = $subject;
	}

    public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}


    public function getPriority(){
		return $this->priority;
	}

	public function setPriority($priority){
		$this->priority = $priority;
	}

	public function getSeverity(){
		return $this->severity;
	}

	public function setSeverity($severity){
		$this->severity = $severity;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getDue_date(){
		return $this->due_date;
	}

	public function setDue_date($due_date){
		$this->due_date = $due_date;
	}

    public function get_parent_case(){
		return $this->parent_case;
	}

    public function set_parent_case($parent_case){
		 $this->parent_case=$parent_case;
	}



    public function getTypeDropDown()
	{
		$sql = 'SELECT * from case_types';
		$fetch =  $this->dbh->query($sql);
		$record= $this->dbh->resultSet();
		//var_dump ( $record);
		return $record;
	}

    public function getParentDropDown()
	{
		$sql = 'SELECT * from company_cases';
		$fetch =  $this->dbh->query($sql);
		$record= $this->dbh->resultSet();
		//var_dump ( $record);
		return $record;
	}


    public function addCase()
    {
        $this->dbh->query("INSERT INTO `company_cases`( `case_number`, `case_holder_id`, `type_id`, `subject`, `status`, `priority`, `severity`, `description`, `due_date`, `creation_date`) 
        VALUES (:case_number, :case_holder_id, :type_id, :subject, :status, :priority, :severity, :description, :due_date , :creation_date);
        INSERT INTO `parent_case`(`case_number`, `parent_number`)  VALUES(:case_number, :parent_number);
        ");

        $this->dbh->bind(':case_number', $this->case_number);
        $this->dbh->bind(':case_holder_id', $this->case_holder_id);
        $this->dbh->bind(':type_id', $this->type_id);
        $this->dbh->bind(':subject', $this->subject);
        $this->dbh->bind(':status', $this->status);
        $this->dbh->bind(':priority', $this->priority);
        $this->dbh->bind(':severity', $this->severity);
        $this->dbh->bind(':description', $this->description);
        $this->dbh->bind(':due_date', $this->due_date);
        $this->dbh->bind(':creation_date', $this->creation_date);
        $this->dbh->bind(':parent_number', $this->parent_case);
		return $this->dbh->execute();



}
}