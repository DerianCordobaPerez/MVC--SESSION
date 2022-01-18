<?php
class Admin {
    /**
     * Admin constructor.
     * @param string $license
     * @param string $password
     */
    public function __construct(private string $license = "", private string $password = "") {}

    /**
     * @return string
     */
    public function get_password(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function set_password(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function get_license(): string
    {
        return $this->license;
    }

    /**
     * @param string $license
     */
    public function set_license(string $license): void
    {
        $this->license = $license;
    }
}