<?php

class MvctHelpShell {

	public function main() {
		echo "Usage: mvct COMMAND [command-specific-options]\n";
		echo "\n";
		echo "COMMAND:\n";
		echo "\n";
		echo "help               # Show this message\n";
		echo "generate [options] # Generate scaffold, element, template\n";
		echo "\n";
		echo "Generate options:\n";
		echo "\n";
		echo "theme [theme-name]                        # Theme scaffold\n";
		echo "template [theme-name] [template-name]     # Template\n";
		echo "element [theme-name] [element-name]       # M,V,C and test files\n";
		echo "controller [theme-name] [controller-name] # Controller\n";
		echo "model [theme-name] [model-name]           # Model\n";
		echo "view [theme-name] [view-name]             # View\n";
		echo "test [theme-name] [test-name]             # Test\n";
		echo "fixture [theme-name] [fixture-name]       # Fixture yaml\n";
	}

}
