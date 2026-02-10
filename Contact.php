<?php

class Contact {
    private ?int $id = null;
    private string $name;
    private string $email;
    private string $phone_number;

    public function __toString(): string
    {
        return sprintf(
            "Contact #%s : %s (%s) - Tél : %s",
            $this->id ?? 'Nouveau',
            $this->name,
            $this->email,
            $this->phone_number
        );
    }

    // --- ID ---
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }

    // --- NAME ---
    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    // --- EMAIL ---
    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    // --- PHONE NUMBER ---
    public function getPhoneNumber(): string {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self {
        $this->phone_number = $phone_number;
        return $this;
    }
}