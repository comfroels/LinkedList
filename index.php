<?php

class Node {
	public $next;
	public $previous;
	public $value;
	public function __construct($val) {
		$this->value = $val;
	}
}

class DoublyLinkedList {
	public $first;
	public $last;
	public function addEnd($node) {
		if ($this->first == NULL && $this->last == NULL) {
			$this->first = $node;
		}
		else if ($this->last == NULL) {
			$this->last = $node;
			$node->previous = $this->first;
			$this->first->next = $node;
		}
		else {
			$this->last->next = $node;
			$node->previous = $this->last;
			$this->last = $node;
		}
	}
	public function addAfter($node,$newNode) {
		$newNode->previous = $node;
		$newNode->next = $node->next;
		if ($node->next == NULL) {
			$this->last = $newNode;
		} 
		else {
			$node->next->previous = $newNode;
		}
		$node->next = $newNode;
	}
	public function addBefore($node,$newNode) {
		$newNode->next = $node;
		$newNode->previous = $node->previous;
		if ($node->previous == NULL) {
			$this->first = $newNode;
		}
		else {
			$node->previous->next = $newNode;
			$node->previous = $newNode;
		}
	}
	public function delete($node) {
		if ($node->previous == NULL) {
			$this->first = $node->next;
			$node->next->previous = NULL;
		}
		else if ($node->next == NULL) {
			$this->last = $node->previous;
			$node->previous->next = NULL;
		}
		else {
			$node->next->previous = $node->previous;
			$node->previous->next = $node->next;
		}
	}
	public function display() {
		if ($this->first !== NULL) {
			$temp = $this->first;
			while($temp != $this->last) {
				?>
				<h6><?= $temp->value ?></h6>
<?php
				$temp = $temp->next;
			} ?>
			<h6><?= $temp->value ?></h6>
<?php	}
	}
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);
$node5 = new Node(5);

$list = new DoublyLinkedList();

$list->addEnd($node1);
$list->addEnd($node2);
$list->addEnd($node3);
$list->addEnd($node4);
$list->addEnd($node5);
$list->display();
echo "<br>";
$node6 = new Node(6);
$list->addBefore($node4,$node6);
$list->display();
echo "<br>";
$node7 = new Node(7);
$list->addAfter($node3,$node7);
$list->display();
echo "<br>";
$list->delete($node4);
$list->display();

?>