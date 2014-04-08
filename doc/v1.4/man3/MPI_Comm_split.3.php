<?php
$topdir = "../../..";
$title = "MPI_Comm_split(3) man page (version 1.4.5)";
$meta_desc = "Open MPI v1.4.5 man page: MPI_COMM_SPLIT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_split </b> - Creates new communicators based on colors and keys.

<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_split(MPI_Comm comm, int color, int key,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Comm *newcomm)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_SPLIT(COMM, COLOR, KEY, NEWCOMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, COLOR, KEY, NEWCOMM, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI::Intercomm MPI::Intercomm::Split(int color, int key) const
MPI::Intracomm MPI::Intracomm::Split(int color, int key) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator (handle). </dd>

<dt>color </dt>
<dd>Control of subset assignment
(nonnegative integer). </dd>

<dt>key </dt>
<dd>Control of rank assignment (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output
Parameters</a></h2>

<dl>

<dt>newcomm </dt>
<dd>New communicator (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
This function partitions the group associated
with comm into disjoint subgroups, one for each value of color. Each subgroup
contains all processes of the same color. Within each subgroup, the processes
are ranked in the order defined by the value of the argument key, with
ties broken according to their rank in the old group. A new communicator
is created for each subgroup and returned in newcomm. A process may supply
the color value MPI_UNDEFINED, in which case newcomm returns MPI_COMM_NULL.
This is a collective call, but each process is permitted to provide different
values for color and key.  <p>
When you call MPI_Comm_split on an inter-communicator,
the processes on the left with the same color as those on the right combine
to create a new inter-communicator.  The key argument describes the relative
rank of processes on each side of the inter-communicator.  The function returns
MPI_COMM_NULL for  those colors that are specified on only one side of
the inter-communicator, or for those that specify MPI_UNDEFINED as the color.
  <p>
A call to <a href="../man3/MPI_Comm_create.3.php">MPI_Comm_create</a>(<i>comm</i>, <i>group</i>, <i>newcomm</i>) is equivalent to a call
to MPI_Comm_split(<i>comm</i>, <i>color</i>,<i> key</i>, <i>newcomm</i>), where all members of <i>group</i>
provide <i>color</i> = 0 and <i>key</i> = rank in group, and all processes that are not
members of <i>group</i> provide <i>color</i> = MPI_UNDEFINED. The function MPI_Comm_split
allows more general partitioning of a group into one or more subgroups
with optional reordering.  <p>
The value of <i>color</i> must be nonnegative or MPI_UNDEFINED.

<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
This is an extremely powerful mechanism for dividing a single communicating
group of processes into k subgroups, with k chosen implicitly by the user
(by the number of colors asserted over all the processes). Each resulting
communicator will be nonoverlapping. Such a division could be useful for
defining a hierarchy of computations, such as for multigrid or linear algebra.
  <p>
Multiple calls to MPI_Comm_split can be used to overcome the requirement
that any call have no overlap of the resulting communicators (each process
is of only one color per call). In this way, multiple overlapping communication
structures can be created. Creative use of the color and key in such splitting
operations is encouraged.  <p>
Note that, for a fixed color, the keys need not
be unique. It is MPI_Comm_split&rsquo;s responsibility to sort processes in ascending
order according to this key, and to break ties in a consistent way. If all
the keys are specified in the same way, then all the processes in a given
color will have the relative rank order as they did in their parent group.
(In general, they will have different ranks.) <p>
Essentially, making the key
value zero for all processes of a given color means that one needn&rsquo;t really
pay attention to the rank-order of the processes in the new communicator.

<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. C++ functions
do not return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI:Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<p>
<a href="../man3/MPI_Comm_create.3.php">MPI_Comm_create</a> <br>
<a href="../man3/MPI_Intercomm_create.3.php">MPI_Intercomm_create</a> <br>
<a href="../man3/MPI_Comm_dup.3.php">MPI_Comm_dup</a> <br>

<p><a href="../man3/MPI_Comm_free.3.php">MPI_Comm_free</a>
<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
<li><a name='toc10' href='#sect10'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
