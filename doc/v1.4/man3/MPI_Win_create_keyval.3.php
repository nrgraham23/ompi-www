<?php
$topdir = "../../..";
$title = "MPI_Win_create_keyval(3) man page (version 1.4.5)";
$meta_desc = "Open MPI v1.4.5 man page: MPI_WIN_CREATE_KEYVAL(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Win_create_keyval</b> - Creates a keyval for a window.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Win_create_keyval(MPI_Win_copy_attr_function *win_copy_attr_fn,

<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Win_delete_attr_function *win_delete_attr_fn,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int *win_keyval, void *extra_state)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_WIN_CREATE_KEYVAL(WIN_COPY_ATTR_FN, WIN_DELETE_ATTR_FN,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;WIN_KEYVAL, EXTRA_STATE, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;EXTERNAL WIN_COPY_ATTR_FN, WIN_DELETE_ATTR_FN
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER WIN_KEYVAL, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) EXTRA_STATE
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
static int MPI::Win::Create_keyval(MPI::Win::Copy_attr_function*
<tt> </tt>&nbsp;<tt> </tt>&nbsp;win_copy_attr_fn,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI::Win::Delete_attr_function* win_delete_attr_fn,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;void* extra_state)
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>win_copy_attr_fn </dt>
<dd>Copy callback function for <i>win_keyval</i>
(function). </dd>

<dt>win_delete_attr_fn </dt>
<dd>Delete callback function for <i>win_keyval</i> (function).
 </dd>

<dt>extra_state </dt>
<dd>Extra state for callback functions.
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>win_keyval
</dt>
<dd>Key value for future access (integer).  </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status
(integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
The argument <i>win_copy_attr_fn</i> may be specified as
MPI_WIN_NULL_COPY_FN or MPI_WIN_DUP_FN from either C, C++, or Fortran. MPI_WIN_NULL_COPY_FN
is a function that serves only to return <i>flag</i> = 0 and MPI_SUCCESS. MPI_WIN_DUP_FN
is a simple-minded copy function that sets <i>flag</i> = 1, returns the value of
<i>attribute_val_in</i> in <i>attribute_val_out</i>, and returns MPI_SUCCESS.  <p>
The argument
<i>win_delete_attr_fn</i> may be specified as MPI_WIN_NULL_DELETE_FN from either
C, C++, or Fortran. MPI_WIN_NULL_DELETE_FN is a function that serves only
to return MPI_SUCCESS.  <p>
The C callback functions are: <p>
<br>
<pre>typedef int MPI_Win_copy_attr_function(MPI_Win oldwin, int win_keyval,

             void *extra_state, void *attribute_val_in,
             void *attribute_val_out, int *flag);
</pre><p>
and <p>
<br>
<pre>typedef int MPI_Win_delete_attr_function(MPI_Win win, int win_keyval,
             void *attribute_val, void *extra_state);
</pre><p>
The Fortran callback functions are: <p>
<br>
<pre>SUBROUTINE WIN_COPY_ATTR_FN(OLDWIN, WIN_KEYVAL, EXTRA_STATE,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;ATTRIBUTE_VAL_IN, ATTRIBUTE_VAL_OUT, FLAG, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER OLDWIN, WIN_KEYVAL, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) EXTRA_STATE, ATTRIBUTE_VAL_IN,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;ATTRIBUTE_VAL_OUT
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL FLAG
</pre><p>
and <p>
<br>
<pre>SUBROUTINE WIN_DELETE_ATTR_FN(WIN, WIN_KEYVAL, ATTRIBUTE_VAL,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;EXTRA_STATE, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER WIN, WIN_KEYVAL, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) ATTRIBUTE_VAL, EXTRA_STATE
</pre><p>
The C++ callbacks are: <p>
<br>
<pre>typedef int MPI::Win::Copy_attr_function(const MPI::Win&amp; oldwin,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int win_keyval, void* extra_state, void* attribute_val_in,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;void* attribute_val_out, bool&amp; flag);
</pre><p>
and <p>
<br>
<pre>typedef int MPI::Win::Delete_attr_function(MPI::Win&amp; win, int win_keyval,
void* attribute_val, void* extra_state);
</pre>
<p>
<h2><a name='sect8' href='#toc8'>Fortran 77 Notes</a></h2>
The MPI standard prescribes portable Fortran syntax for
the <i>EXTRA_STATE</i> argument only for Fortran 90. FORTRAN 77 users may use the
non-portable syntax <p>
<br>
<pre>     INTEGER*MPI_ADDRESS_KIND EXTRA_STATE
</pre><p>
where MPI_ADDRESS_KIND is a constant defined in mpif.h and gives the length
of the declared integer in bytes.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI:Exception object. <p>
Before
the error value is returned, the current MPI error handler is called. By
default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Fortran 77 Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
