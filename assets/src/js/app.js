// Importing JavaScript
//
// You have two choices for including Bootstrap's JS files—the whole thing,
// or just the bits that you need.


// Option 1
//
// Import Bootstrap's bundle (all of Bootstrap's JS + Popper.js dependency)

// import "../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";


// Option 2
//
// Import just what we need

// If you're importing tooltips or popovers, be sure to include our Popper.js dependency
import { createPopper } from '@popperjs/core';

// You can specify which plugins you need
// import { Tooltip, Toast, Popover } from 'bootstrap';

// Alternatively, you may import plugins individually as needed:
import Collapse from '../../../node_modules/bootstrap/js/dist/collapse';
