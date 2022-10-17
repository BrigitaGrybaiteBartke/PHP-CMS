<?php

namespace models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
class Page
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /** 
     * @ORM\Column(type="string") 
     */
    protected $pageTitle;

    /** 
     * @ORM\Column(type="text")
     */
    protected $pageContent;

	/**
	 * 
	 * @return mixed
	 */
	function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 * @param mixed $id 
	 * @return Page
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * 
	 * @return mixed
	 */
	function getPageTitle() {
		return $this->pageTitle;
	}
	
	/**
	 * 
	 * @param mixed $pageTitle 
	 * @return Page
	 */
	function setPageTitle($pageTitle): self {
		$this->pageTitle = $pageTitle;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getPageContent() {
		return $this->pageContent;
	}
	
	/**
	 * 
	 * @param mixed $pageContent 
	 * @return Page
	 */
	function setPageContent($pageContent): self {
		$this->pageContent = $pageContent;
		return $this;
	}
}
