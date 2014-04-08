<?php
$topdir = "../../..";
$title = "MPI_Dist_graph_create(3) man page (version 1.8)";
$meta_desc = "Open MPI v1.8 man page: MPI_DIST_GRAPH_CREATE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Dist_graph_create </b> - Makes a new communicator to which topology
information has been attached.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Dist_graph_create(MPI_Comm comm_old, int n, const int sources[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const int degrees[], const int destinations[], const int weights[],
        MPI_Info info, int reorder, MPI_Comm *comm_dist_graph)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_DIST_GRAPH_CREATE(COMM_OLD, N, SOURCES, DEGREES, DESTINATIONS, WEIGHTS,
                INFO, REORDER, COMM_DIST_GRAPH, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM_OLD, N, SOURCES(*), DEGRES(*), WEIGHTS(*), INFO
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM_DIST_GRAPH, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL   REORDER
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameters</a></h2>

<dl>

<dt>comm_old </dt>
<dd>Input communicator without topology (handle). </dd>

<dt>n
</dt>
<dd>Number of source nodes for which this process specifies edges (non-negative
integer). </dd>

<dt>sources </dt>
<dd>Array containing the <i>n</i> source nodes for which this process
species edges (array of non-negative integers). </dd>

<dt>degrees </dt>
<dd>Array specifying
the number of destinations for each source node in the source node array
(array of non-negative integers). </dd>

<dt>destinations </dt>
<dd>Destination nodes for the
source nodes in the source node array (array of non-negative integers). </dd>

<dt>weights
</dt>
<dd>Weights for source to destination edges (array of non-negative integers).
</dd>

<dt>Hints on optimization and interpretation of weights (handle). </dt>
<dd></dd>

<dt>reorder </dt>
<dd>Ranking
may be reordered (true) or not (false) (logical).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>comm_dist_graph
</dt>
<dd>Communicator with distibuted graph topology added (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran
only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
MPI_Dist_graph_create creates
a new communicator <i>comm_dist_graph</i> with distrubuted graph topology and
returns a handle to the new communicator. The number of processes in <i>comm_dist_graph</i>
is identical to the number of processes in <i>comm_old</i>. Concretely, each process
calls the constructor with a set of directed (source,destination) communication
edges as described below. Every process passes an array of <i>n</i> source nodes
in the <i>sources</i> array. For each source node, a non-negative number of destination
nodes is specied in the <i>degrees</i> array. The destination nodes are stored
in the corresponding consecutive segment of the <i>destinations</i> array. More
precisely, if the i-th node in sources is s, this species <i>degrees</i>[i] <i>edges</i>
(s,d) with d of the j-th such edge stored in <i>destinations</i>[<i>degrees</i>[0]+...+<i>degrees</i>[i-1]+j].
The weight of this edge is stored in <i>weights</i>[<i>degrees</i>[0]+...+<i>degrees</i>[i-1]+j].
Both the <i>sources</i> and the <i>destinations</i> arrays may contain the same node
more than once, and the order in which nodes are listed as destinations
or sources is not signicant. Similarly, different processes may specify
edges with the same source and destination nodes. Source and destination
nodes must be process ranks of comm_old. Different processes may specify
different numbers of source and destination nodes, as well as different
source to destination edges. This allows a fully distributed specification
of the communication graph. Isolated processes (i.e., processes with no outgoing
or incoming edges, that is, processes that do not occur as source or destination
node in the graph specication) are allowed. The call to MPI_Dist_graph_create
is collective.
<p> If reorder = false, all processes will have the same rank
in comm_dist_graph as in comm_old. If reorder = true then the MPI library
is free to remap to other processes (of comm_old) in order to improve communication
on the edges of the communication graph. The weight associated with each
edge is a hint to the MPI library about the amount or intensity of communication
on that edge, and may be used to compute a
<p>
<h2><a name='sect7' href='#toc7'>Weights</a></h2>
Weights are specied
as non-negative integers and can be used to influence the process remapping
strategy and other internal MPI optimizations. For instance, approximate
count arguments of later communication calls along specic edges could be
used as their edge weights. Multiplicity of edges can likewise indicate
more intense communication between pairs of processes. However, the exact
meaning of edge weights is not specied by the MPI standard and is left
to the implementation. An application can supply the special value MPI_UNWEIGHTED
for the weight array to indicate that all edges have the same (effectively
no) weight. It is erroneous to supply MPI_UNWEIGHTED for some but not all
processes of comm_old. If the graph is weighted but <i>n</i> = 0, then MPI_WEIGHTS_EMPTY
or any arbitrary array may be passed to weights. Note that MPI_UNWEIGHTED
and MPI_WEIGHTS_EMPTY are not special weight values; rather they are special
values for the total array argument. In Fortran, MPI_UNWEIGHTED and MPI_WEIGHTS_EMPTY
are objects like MPI_BOTTOM (not usable for initialization or assignment).
See MPI-3 �&sect; 2.5.4.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value; C
routines as the value of the function and Fortran routines in the last
argument. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<a href="../man3/MPI_Dist_graph_create_adjacent.3.php">MPI_Dist_graph_create_adjacent</a> <a href="../man3/MPI_Dist_graph_neighbors.3.php">MPI_Dist_graph_neighbors</a>

<p><a href="../man3/MPI_Dist_graph_neighbors_count.3.php">MPI_Dist_graph_neighbors_count</a>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input Parameters</a></li>
<li><a name='toc5' href='#sect5'>Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Weights</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
