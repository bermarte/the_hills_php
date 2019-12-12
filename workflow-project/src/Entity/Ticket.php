<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text_body;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_public;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_open;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_in_progress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $customer_comment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $agent_comment;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_waiting_for_feedback;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_escalated;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tickets")
     */
    private $relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextBody(): ?string
    {
        return $this->text_body;
    }

    public function setTextBody(string $text_body): self
    {
        $this->text_body = $text_body;

        return $this;
    }

    public function getIsPublic(): ?bool
    {
        return $this->is_public;
    }

    public function setIsPublic(bool $is_public): self
    {
        $this->is_public = $is_public;

        return $this;
    }

    public function getIsOpen(): ?bool
    {
        return $this->is_open;
    }

    public function setIsOpen(bool $is_open): self
    {
        $this->is_open = $is_open;

        return $this;
    }

    public function getIsInProgress(): ?bool
    {
        return $this->is_in_progress;
    }

    public function setIsInProgress(bool $is_in_progress): self
    {
        $this->is_in_progress = $is_in_progress;

        return $this;
    }

    public function getCustomerComment(): ?string
    {
        return $this->customer_comment;
    }

    public function setCustomerComment(string $customer_comment): self
    {
        $this->customer_comment = $customer_comment;

        return $this;
    }

    public function getAgentComment(): ?string
    {
        return $this->agent_comment;
    }

    public function setAgentComment(string $agent_comment): self
    {
        $this->agent_comment = $agent_comment;
        return $this;
    }

    public function getIsWaitingForFeedback(): ?bool
    {
        return $this->is_waiting_for_feedback;
    }

    public function setIsWaitingForFeedback(bool $is_waiting_for_feedback): self
    {
        $this->is_waiting_for_feedback = $is_waiting_for_feedback;

        return $this;
    }

    public function getIsEscalated(): ?bool
    {
        return $this->is_escalated;
    }

    public function setIsEscalated(bool $is_escalated): self
    {
        $this->is_escalated = $is_escalated;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getRelation(): ?User
    {
        return $this->relation;
    }

    public function setRelation(?User $relation): self
    {
        $this->relation = $relation;

        return $this;
    }
}
