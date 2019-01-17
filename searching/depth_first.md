# Depth-first search
Consider the following graph:

![dfs](../images/bfs_dfs.jpeg)

The adjacency list representation of the graph is:
Node | Adjacency list
---- | ----
A | B, C
B | A, D
C | A, D, E
D | B, C, F
E | C, F
F | D, E

To traverse the graph in a depthwise motion:
- Pick a starting node, push it into the stack S, and mark it as visited
- Visit its adjacent unvisited vertices, push them into the stack S and mark them as visited
- If no adjacent vertex is found, pop the top vertex from the stack S, visit its adjacent unvisited vertices marking each one
- Repeat the process until the stack is empty

## How is the traversal done?
Revisiting our graph:

![dfs](../images/bfs_dfs.jpeg)

How is the graph traversed depthward?

*Pick the starting node as A:*
- Push A into the stack and mark it as visited
- Visit its unvisited adjacent nodes, starting by vertex B
- Push B into the stack and mark it as visited
- Explore any unvisited vertices adjacent to B
- The unvisited vertices adjacent to B is D only
- Visit D, push it into the stack and mark it as visited
- The unvisited vertices adjacent to vertex D are C and F
- Visit vertex C, add it to the stack and mark it as visited
- The unvisited neighbours of C is E only
- Visit vertex E, push it into the stack and mark it as visited
- Explore any unvisited vertices adjacent to vertex E, which is F only
- Visit vertex F, mark it as visited and push it into the stack
- There are no adjacent unvisited nodes of F. Therefore, pop it from the stack
- Then pop node E and search for its unvisited neighbours. As all its neighbours have been visited, pop the next top node from the stack. Repeat the process until the stack is empty.

The depth-first search of the graph gives:

```
A->B->D->C->E->F
