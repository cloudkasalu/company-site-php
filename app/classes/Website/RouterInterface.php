<?php
namespace classes\Website;
interface RouterInterface {
    public function getDefaultRoute(): string;
    public function getController(): ?object;
    public function getControllerLayout(): string;
}