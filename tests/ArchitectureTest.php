<?php
namespace Test;
use PHPUnit\Framework\TestCase;

class ArchitectureTest extends TestCase
{
    public function testDirectoryExists()
    {
        $this->assertDirectoryExists(ROOT_DIR."/app");
        $this->assertDirectoryExists(ROOT_DIR."/app/".FRAMEWORK);

    }
}