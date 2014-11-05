<?php

class MvctHelpShell {

	public function main() {
		echo "Usage: mvct COMMAND [command-specific-options]\n";
		echo "\n";
		echo "COMMAND:\n";
		echo "help               # Show this message\n";
		echo "generate [options] # Generate scaffold, element, template\n";
		echo "\n";
		echo "Generate options:\n";
		echo "theme [theme-name]           # Theme scaffold\n";
		echo "template [template-name]     # Template\n";
		echo "element [element-name]       # MVC and test files\n";
		echo "controller [controller-name] # Controller\n";
		echo "model [model-name]           # Model\n";
		echo "view [view-name]             # View\n";
		echo "test [test-name]             # Test\n";
		echo "fixture [fixture-name]       # Fixture yaml\n";
	}

}
